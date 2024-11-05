<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="id">
      <span>{{ label }}</span>
      <!-- Lock icon toggle -->
      <i
          :class="locked ? 'bi bi-lock-fill' : 'bi bi-unlock-fill'"
          @click="toggleLock"
          style="cursor: pointer; margin-left: 0.5rem;"
      ></i>
    </label>
    <div class="d-flex justify-content-between align-items-center">
      <input
          type="text"
          :id="id"
          :placeholder="label"
          v-model="color"
          class="form-control-plaintext w-75"
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
      locked: false, // Track locked state
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
    toggleLock() {
      this.locked = !this.locked;
      this.$emit('update-lock', { id: this.id, locked: this.locked }); // Emit lock status to parent
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
