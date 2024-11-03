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

        <!-- Dropdown for selecting the iframe source -->
        <div class="list-group-item">
          <label for="srcSelect" class="fw-bold text-muted">Select Example:</label>
          <select v-model="selectedSrc" id="srcSelect" class="form-select mb-3">
            <option v-for="(src, index) in sourcesOptions" :key="index" :value="src">
              {{ src }}
            </option>
          </select>
        </div>

        <!-- Color and Size Inputs -->
        <div class="list-group-item" v-for="(color, key) in colorOptions" :key="key">
          <ColorPickerInput :label="color.label" :id="color.id" v-model="store.variables[color.variable]" />
        </div>

        <div class="list-group-item">
          <SizeInput label="Border Radius" id="border-radius" v-model="store.variables.borderRadius" />
        </div>

        <div class="list-group-item">
          <a class="btn btn-primary w-100" @click="setRandomColorVariables">Randomise</a>
        </div>
        <div class="list-group-item">
          <a class="btn btn-primary w-100">AI Builder</a>
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
import AppLayout from '../AppLayout.vue';
import axios from "axios";
import { store } from '../../Store/store';
import { watch, ref, onMounted, computed } from 'vue';

export default {
  setup() {
    const previewFrame = ref(null);

    const compile = async () => {
      store.isLoading = true;
      axios.defaults.baseURL = 'https://localhost/';
      await axios.post('api/v1/compile', store.variables).then((response) => {
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

    const generateRandomHexColor = () => {
      return `#${Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0')}`;
    };

    const setRandomColorVariables = () => {
      Object.keys(store.variables).forEach((key) => {
        store.variables[key] = generateRandomHexColor();
      });
    };

    // Computed properties for accessing store sources options and selected source
    const sourcesOptions = computed(() => store.sourcesOptions);
    const selectedSrc = ref(sourcesOptions.value[0] || '');

    watch(
        () => store.variables,
        compile,
        { deep: true }
    );

    // Watch for changes to sourcesOptions and update selectedSrc if necessary
    watch(sourcesOptions, (newOptions) => {
      if (newOptions.length > 0 && !newOptions.includes(selectedSrc.value)) {
        selectedSrc.value = newOptions[0];
      }
    }, { immediate: true });

    // Watch selectedSrc and compile whenever a new source is selected
    watch(selectedSrc, () => {
      compile();
    });

    onMounted(async () => {
      await axios.get('api/v1/variables').then((response) => {
        store.variables = response.data;
      }).finally(() => {
        compile();
      });
    });

    // Options for ColorPickerInput
    const colorOptions = [
      { label: "Background Color", id: "background-color", variable: "bodyBg" },
      { label: "Primary Color", id: "primary-color", variable: "primary" },
      { label: "Secondary Color", id: "secondary-color", variable: "secondary" },
      { label: "Info Color", id: "info-color", variable: "info" },
      { label: "Success Color", id: "success-color", variable: "success" },
      { label: "Warning Color", id: "warning-color", variable: "warning" },
      { label: "Danger Color", id: "danger-color", variable: "danger" },
      { label: "Dark Color", id: "dark-color", variable: "dark" },
      { label: "Light Color", id: "light-color", variable: "light" },
      { label: "List Group Background Color", id: "list-group-bg-color", variable: "listGroupBg" }
    ];

    return {
      store,
      previewFrame,
      sourcesOptions,
      selectedSrc,
      setRandomColorVariables,
      colorOptions
    };
  },
  components: {
    SizeInput,
    ColorPickerInput,
    AppLayout
  }
};
</script>

<style lang="css" scoped>
</style>
