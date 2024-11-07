<template>
  <AppLayout>
    <template #header>
      <h1>Bootstrap Customizer</h1>
    </template>

    <template #sidebar>
      <div class="list-group list-group-flush">
        <div class="list-group-item text-center">
          <div class="fs-4 fw-light">Bootstrap Customizer</div>
        </div>

        <div class="list-group-item d-flex justify-content-start gap-3 align-items-center">

          <a href="#" class="btn btn-primary rounded-pill">
            <i class="bi bi-robot fs-5"></i>
          </a>

          <a href="#" class="btn btn-primary rounded-pill">
            <i class="bi bi-arrow-counterclockwise fs-5"></i>
          </a>

          <div class="dropdown">
            <button class="btn btn-primary rounded-pill" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
              <i class="bi bi-download fs-5"></i>
            </button>
            <ul class="dropdown-menu">
              <li><a @click.prevent="download('variables')" class="dropdown-item" href="#">_variable.scss</a></li>
              <li><a @click.prevent="download('bootstrap')" class="dropdown-item" href="#">bootstrap.css</a></li>
              <li><a @click.prevent="download('bootstrapMin')" class="dropdown-item" href="#">bootstrap.min.css</a></li>
            </ul>
          </div>
        </div>

        <div class="accordion accordion-flush" id="customizerAccordion">
          <!-- Loop over each section dynamically -->
          <div
              v-for="(section, sectionKey) in store.variables"
              :key="sectionKey"
              class="accordion-item"
          >
            <div class="d-flex justify-content-between align-items-center p-2" :id="'heading' + sectionKey">
              <a class="link link-dark text-decoration-none text-capitalize">
                {{ sectionKey.replace(/([A-Z])/g, ' $1') }}
              </a>
              <div class="hstack gap-2">
                <a v-if="sectionKey === 'colors'"
                   class="btn btn-light rounded-pill bi bi-shuffle fs-5"
                   @click="randomizeColors"></a>
                <a
                    :data-bs-target="'#collapse' + sectionKey"
                    :aria-expanded="expandedSections[sectionKey] || false"
                    :aria-controls="'collapsed' + sectionKey"
                    data-bs-toggle="collapse"
                    class="btn btn-light rounded-pill"
                    @click="toggleSection(sectionKey)">
                  <i :class="expandedSections[sectionKey] ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="fs-5"></i>
                </a>
              </div>
            </div>
            <div
                :id="'collapse' + sectionKey"
                class="accordion-collapse collapse"
                :aria-labelledby="'heading' + sectionKey"
                data-bs-parent="#customizerAccordion"
            >
              <div>
                <!-- Loop over each variable in the section and render appropriate input -->
                <div
                    v-for="(value, key) in section"
                    :key="key"
                    class="list-group-item"
                >

                  <!-- Render ColorPickerInput if it's a color -->
                  <ColorPickerInput
                      v-if="value.type === 'color'"
                      v-model="store.variables[sectionKey][key]"
                      :colorMap="store.variables.colors"
                      @update-lock="handleLockUpdate"
                  />

                  <StringInput
                      v-if="value.type === 'string'"
                      :label="value.description"
                      :id="key"
                      v-model="store.variables[sectionKey][key]"
                  />


                  <!-- Render SizeInput if it's a size -->
                  <SizeInput
                      v-else-if="value.type === 'size'"
                      :label="value.description"
                      :id="key"
                      v-model="store.variables[sectionKey][key]"
                  />

                  <FloatInput
                      v-else-if="value.type === 'float'"
                      :label="value.description"
                      :id="key"
                      v-model="store.variables[sectionKey][key]"
                  />

                  <!-- Render SwitchInput if it's a boolean -->
                  <SwitchInput
                      v-else-if="value.type === 'boolean'"
                      :label="value.description"
                      :id="key"
                      v-model="store.variables[sectionKey][key]"
                  />

                  <IntegerInput
                      v-else-if="value.type === 'integer'"
                      :label="value.description"
                      :id="key"
                      v-model="store.variables[sectionKey][key]"
                  />

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="list-group-item sticky-bottom">
          <button @click.prevent="compile" class="btn btn-primary w-100">
            compile changes
          </button>
        </div>

      </div>
    </template>

    <template #main>
      <div class="vh-100" style="position: relative;">
        <div v-if="store.isLoading" class="d-flex min-vh-100 bg-white w-100 justify-content-center align-items-center">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <iframe
            ref="previewFrame"
            src="/examples/example.bootstrap.5.3.html"
            style="width: 100%; height: 100%;"
        ></iframe>
      </div>
    </template>
  </AppLayout>
</template>

<script>
import ColorPickerInput from '../Input/ColorPickerInput.vue';
import SizeInput from "../Input/SizeInput.vue";
import SwitchInput from "../Input/SwitchInput.vue";
import AppLayout from '../AppLayout.vue';
import axios from "axios";
import {store} from '../../Store/store';
import {watch, ref, onMounted, reactive} from 'vue';
import AutocompleteInput from "../Input/AutocompleteInput.vue";
import StringInput from "../Input/StringInput.vue";
import FloatInput from "../Input/FloatInput.vue";
import IntegerInput from "../Input/IntegerInput.vue";

export default {
  setup() {
    const previewFrame = ref(null);
    const expandedSections = reactive({});

    const toggleSection = (sectionKey) => {
      expandedSections[sectionKey] = !expandedSections[sectionKey];
    };

    const download = async (identifier) => {
      try {
        const response = await axios.post(
            `/api/v1/download/bootstrap53/${identifier}`,
            store.variables,
            {responseType: 'blob'} // important for binary data
        );

        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', `${identifier}.css`);
        document.body.appendChild(link);
        link.click();
        link.remove();
      } finally {
        store.isLoading = false;
      }
    };

    const compile = async () => {
      store.isLoading = true;
      await axios.post('/api/v1/compile/bootstrap53', store.variables).then((response) => {
        store.css = response.data;
        applyCss(store.css);
      }).finally(() => {
        store.isLoading = false;
      });
    };

    const applyCss = (css) => {
      const iframe = previewFrame.value;
      if (iframe && iframe.contentDocument) {
        const styleTag = iframe.contentDocument.getElementById("dynamic-styles");
        if (styleTag) {
          styleTag.innerHTML = css;
        }
      }
    };

    const randomizeColors = () => {
      store.setRandomColorVariables();
    };

    const handleLockUpdate = ({id, locked}) => {
      store.updateLock(id, locked);
    };

    onMounted(async () => {
      await axios.get('/api/v1/inputs/bootstrap53').then((response) => {
        store.variables = response.data;
      }).finally(()=>{
        compile()
      });
    });

    return {
      store,
      previewFrame,
      randomizeColors,
      handleLockUpdate,
      expandedSections,
      toggleSection,
      download,
      compile
    };
  },
  components: {
    IntegerInput,
    FloatInput,
    StringInput,
    AutocompleteInput,
    SwitchInput,
    SizeInput,
    ColorPickerInput,
    AppLayout
  }
};
</script>

<style lang="css" scoped>
</style>
