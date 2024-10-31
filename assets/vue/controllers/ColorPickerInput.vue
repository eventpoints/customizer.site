<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="this.id">{{ this.label }}</label>
    <div class="d-flex justify-content-between align-items-center">
      <input
          type="text"
          :id="this.id"
          :placeholder="this.label"
          v-model="color"
          @input="validateHex"
          class="form-control-plaintext w-75"
          maxlength="7"
      />
      <input
          type="color"
          v-model="color"
          @input="updateColor"
          class="form-control-plaintext color-picker"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: 'ColorPickerInput',
  props: {
    id: String,
    label: String,
    modelValue: {
      type: String,
      default: '#000000',
    },
  },
  data() {
    return {
      color: this.modelValue || '#000000',
    };
  },
  watch: {
    modelValue(newValue) {
      this.color = newValue;
    },
  },
  methods: {
    updateColor() {
      this.$emit('update:modelValue', this.color);
    },
    validateHex() {
      if (/^#[0-9A-Fa-f]{6}$/.test(this.color)) {
        this.updateColor();
      }
    },
  },
};
</script>

<style scoped>
.color-picker {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background-color: transparent;
  width: 30px;
  height: 30px;
  border: none;
  cursor: pointer;
  padding: 0;
}

.color-picker::-webkit-color-swatch {
  border-radius: 50%;
  border: none !important;
}

.color-picker::-moz-color-swatch {
  border-radius: 50%;
  border: none !important;
}
</style>
