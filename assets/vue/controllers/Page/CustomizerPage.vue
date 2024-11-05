<template>
  <AppLayout>
    <template #header>
      <h1>Bootstrap Customizer</h1>
    </template>

    <template #sidebar>
      <div class="list-group list-group-flush">
        <div class="list-group-item text-center">
          <div class="h1">Bootstrap 5.3 Customizer</div>
        </div>

        <div class="list-group-item">
          <label for="srcSelect" class="fw-bold text-muted">Select Example:</label>
          <select v-model="selectedSrc" id="srcSelect" class="form-select mb-3">
            <option v-for="(src, index) in sourcesOptions" :key="index" :value="src">
              {{ src }}
            </option>
          </select>
        </div>

        <div class="accordion accordion-flush" id="customizerAccordion">
          <!-- Loop over each section dynamically -->
          <div
              v-for="(section, sectionKey) in store.variables"
              :key="sectionKey"
              class="accordion-item"
          >
            <div class="d-flex justify-content-between align-items-center p-2" :id="'heading' + sectionKey">
              <a
                  class="fs-4 link link-dark text-decoration-none text-capitalize"
                  data-bs-toggle="collapse"
                  :data-bs-target="'#collapse' + sectionKey"
                  aria-expanded="true"
                  :aria-controls="'collapse' + sectionKey"
              >
                {{ sectionKey.replace(/([A-Z])/g, ' $1') }}
              </a>
              <a v-if="sectionKey === 'colors'" class="btn btn-light rounded-circle bi bi-shuffle" @click="randomizeColors"></a>
            </div>
            <div
                :id="'collapse' + sectionKey"
                class="accordion-collapse collapse show"
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
                      :label="value.description"
                      :id="key"
                      v-model="store.variables[sectionKey][key]"
                      :colorMap="store.variables.colors"
                  @update-lock="handleLockUpdate"
                  />
                  <!-- Render SizeInput if it's a size -->
                  <SizeInput
                      v-else-if="value.type === 'size'"
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

                  <!-- Render input for float type -->
                  <input
                      v-else-if="value.type === 'float'"
                      type="number"
                      step="0.1"
                      :placeholder="value.description"
                      v-model.number="store.variables[sectionKey][key].default"
                      class="form-control"
                  />

                  <!-- Render text input for string type -->
                  <input
                      v-else-if="value.type === 'string'"
                      type="text"
                      :placeholder="value.description"
                      v-model="store.variables[sectionKey][key].default"
                      class="form-control"
                  />

                  <!-- Render text area for gradient type -->
                  <textarea
                      v-else-if="value.type === 'gradient'"
                      :placeholder="value.description"
                      v-model="store.variables[sectionKey][key].default"
                      class="form-control"
                  ></textarea>

                  <!-- Add more conditions if there are other specific types -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="list-group-item">
          <a class="btn btn-primary w-100">AI Builder</a>
        </div>

      </div>
    </template>

    <template #main>

      {{ store.variables.colors }}
      {{ store.css }}
      <div class="vh-100" style="position: relative;">
        <div v-if="store.isLoading" class="d-flex min-vh-100 bg-white w-100 justify-content-center align-items-center">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <iframe
            ref="previewFrame"
            :src="selectedSrc"
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
import { store } from '../../Store/store';
import { watch, ref, onMounted, computed } from 'vue';
import AutocompleteInput from "../Input/AutocompleteInput.vue";

export default {
  setup() {
    const previewFrame = ref(null);

    const compile = async () => {
      store.isLoading = true;
      const variables = generateDefaultJSON(store.variables)
      await axios.post('/api/v1/compile/bootstrap53', variables).then((response) => {
        store.css = response.data.css;
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

    const handleLockUpdate = ({ id, locked }) => {
      store.updateLock(id, locked);
    };

    const sourcesOptions = computed(() => store.sourcesOptions);
    const selectedSrc = ref(sourcesOptions.value[0] || '');

    watch(
        () => store.variables,
        compile,
        { deep: true }
    );

    watch(sourcesOptions, (newOptions) => {
      if (newOptions.length > 0 && !newOptions.includes(selectedSrc.value)) {
        selectedSrc.value = newOptions[0];
      }
    }, { immediate: true });

    watch(selectedSrc, () => {
      compile();
    });

    const generateDefaultJSON = (variables) => {
      const result = {};

      for (const [key, value] of Object.entries(variables)) {
        // If value has a "default" property, use it; otherwise, include the value as-is
        result[key] = value.default !== undefined ? value.default : value;
      }

      return result;
    }

    onMounted(async () => {
      await axios.get('/api/v1/inputs/bootstrap53').then((response) => {
        store.variables = response.data;
      });
    });

    return {
      store,
      previewFrame,
      sourcesOptions,
      selectedSrc,
      randomizeColors,
      handleLockUpdate,
    };
  },
  components: {
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
