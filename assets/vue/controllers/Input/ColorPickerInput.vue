<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="modelValue.label">
      <span>{{ modelValue.label }}</span>
      <!-- Lock icon toggle -->
      <i
          :class="modelValue.isLocked ? 'bi bi-lock-fill' : 'bi bi-unlock-fill'"
          @click="toggleLock"
          style="cursor: pointer; margin-left: 0.5rem;"
      ></i>
    </label>
    <div class="d-flex justify-content-between align-items-center position-relative">
      <!-- Text input for color hex value, rgb, rgba, or SCSS variable -->
      <input
          type="text"
          :id="modelValue.label"
          :placeholder="modelValue.label"
          v-model="inputValue"
          @input="onInput"
          @focus="showSuggestions = true"
          class="form-control w-75"
          :disabled="modelValue.isLocked"
      />

      <!-- Conditionally show color picker or icon for SCSS variable -->
      <template v-if="isHexColor(inputValue)">
        <input
            type="color"
            :value="currentColor"
            @input="updateColorPicker"
            class="form-control color-picker"
            :disabled="modelValue.isLocked"
        />
      </template>
      <template v-else-if="isRgbColor(inputValue)">
        <div class="color-preview" :style="{ backgroundColor: inputValue }"></div>
      </template>
      <template v-else>
        <i class="bi bi-currency-dollar fs-4 text-muted"></i> <!-- Icon for SCSS variables -->
      </template>

      <!-- Suggestions dropdown for SCSS color variables -->
      <ul
          v-if="showSuggestions && filteredSuggestions.length"
          class="dropdown-menu show position-absolute"
          style="top: 100%; left: 0; z-index: 1;"
      >
        <li
            v-for="(variable) in filteredSuggestions"
            :key="variable"
            @click="selectSuggestion(variable)"
            class="dropdown-item"
            style="cursor: pointer;"
        >
          {{ variable }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "ColorPickerInput",
  props: {
    modelValue: {
      type: Object,
      required: true,
    },
    colorMap: {
      type: Object,
      default: () => ({}),
    },
  },
  data() {
    return {
      inputValue: this.modelValue.value || this.modelValue.default || "#000000",
      showSuggestions: false,
    };
  },
  computed: {
    filteredSuggestions() {
      return Object.keys(this.colorMap).filter((variable) =>
          variable.toLowerCase().includes(this.inputValue.toLowerCase())
      );
    },
    currentColor() {
      if (this.isHexColor(this.inputValue)) return this.inputValue;
      if (this.colorMap[this.inputValue]) return this.colorMap[this.inputValue];
      return this.modelValue.default || "#000000";
    },
  },
  watch: {
    modelValue: {
      deep: true,
      handler(newValue) {
        this.inputValue = newValue.value || newValue.default || "#000000";
      },
    },
  },
  methods: {
    onInput() {
      this.showSuggestions = true;
      this.updateModelWithInput(this.inputValue);
    },
    selectSuggestion(variable) {
      const hex = this.colorMap[variable];
      if (hex) {
        this.inputValue = variable;
        this.updateModelWithInput(variable);
      }
      this.showSuggestions = false;
    },
    updateColorPicker(event) {
      const color = event.target.value;
      if (this.isHexColor(color)) {
        this.inputValue = color;
        this.updateModelWithInput(color);
      }
    },
    updateModelWithInput(value) {
      this.modelValue.value = value;
      this.$emit("update:modelValue", this.modelValue);
    },
    toggleLock() {
      this.modelValue.isLocked = !this.modelValue.isLocked;
      this.$emit("update:modelValue", this.modelValue);
    },
    isHexColor(value) {
      return /^#[0-9A-Fa-f]{6}$|^#[0-9A-Fa-f]{3}$/.test(value);
    },
    isRgbColor(value) {
      return /^rgba?\(\s*\d+\s*,\s*\d+\s*,\s*\d+(\s*,\s*[\d.]+)?\)$/.test(value);
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

.dropdown-menu {
  max-height: 150px;
  overflow-y: auto;
}

.color-preview {
  width: 30px;
  height: 30px;
  border-radius: 50%;
}
</style>
