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
          <a class="btn btn-primary w-100" @click="this.setRandomColorVariables">Randomise</a>
        </div>
        <div class="list-group-item">
          <ColorPickerInput label="background color" id="background-color" v-model="variables.bodyBg"/>
        </div>
        <div class="list-group-item">
          <ColorPickerInput label="primary color" id="primary-color" v-model="variables.primary"/>
        </div>
        <div class="list-group-item">
          <ColorPickerInput label="secondary color" id="secondary-color" v-model="variables.secondary"/>
        </div>
        <div class="list-group-item">
          <ColorPickerInput label="success color" id="success-color" v-model="variables.success"/>
        </div>
        <div class="list-group-item">
          <ColorPickerInput label="warning color" id="warning-color" v-model="variables.warning"/>
        </div>
        <div class="list-group-item">
          <ColorPickerInput label="danger color" id="danger-color" v-model="variables.danger"/>
        </div>
      </div>
    </template>

    <template #main>
      <div class="vh-100" style="position: relative;">
        <div v-if="this.isLoading" class="d-flex min-vh-100 bg-white w-100 justify-content-center align-items-center">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <iframe
            ref="previewFrame"
            src="/example.bootstrap.5.3.html"
            style="width: 100%; height: 100%;"
            @load="onIframeLoad"
        ></iframe>
      </div>
    </template>
  </AppLayout>
</template>

<script>
import ColorPickerInput from './ColorPickerInput.vue'
import AppLayout from './AppLayout.vue'
import axios from "axios";
import debounce from 'lodash.debounce'

export default {
  components: {
    ColorPickerInput,
    AppLayout
  },
  data() {
    return {
      css: '',
      isLoading: true,
      variables: {
        bodyBg: '#ffffff',
        primary: '#007bff',
        secondary: '#6c757d',
        success: '#198754',
        info: '#0dcaf0',
        warning: '#ffc107',
        danger: '#dc3545',
      },
    };
  },
  methods: {
    async compile() {
      this.isLoading = true;
      axios.defaults.baseURL = 'https://localhost/';
      await axios.post('api/v1/compile', {
        variables: this.variables
      }).then((response) => {
        this.css = response.data.css;
        this.applyCss(this.css);
      }).finally(() => {
        this.isLoading = false;
      });
    },
    applyCss(css) {
      const iframe = this.$refs.previewFrame;
      if (iframe && iframe.contentDocument) {
        const styleTag = iframe.contentDocument.getElementById("dynamic-styles");
        if (styleTag) {
          styleTag.innerHTML = css;
        }
      }
    },
    generateRandomHexColor() {
      return `#${Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0')}`;
    },
    setRandomColorVariables() {
      Object.keys(this.variables).forEach((key) => {
        this.variables[key] = this.generateRandomHexColor();
      });
    },
    onIframeLoad() {
      this.isLoading = false
    }
  },
  watch: {
    variables: {
      handler: 'compile',
      deep: true,
    },
  },
  async mounted() {
    await axios.get('api/v1/variables').then((response) => {
      console.log(this.variables)
      this.variables = response.data;
    }).finally(() => {
      this.compile();
    })
  }
};
</script>

<style lang="css" scoped>
</style>