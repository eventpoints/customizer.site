<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="id">
      <span>{{ modelValue.label }}</span>
      <!-- Lock icon toggle -->
      <i
          :class="locked ? 'bi bi-lock-fill' : 'bi bi-unlock-fill'"
          @click="toggleLock"
          style="cursor: pointer; margin-left: 0.5rem;"
      ></i>
    </label>
    <div class="d-flex justify-content-between align-items-center position-relative">
      <!-- Text input for color hex value or SCSS variable -->
      <input
          type="text"
          :id="id"
          :placeholder="label"
          v-model="inputValue"
          @input="onInput"
          @focus="showSuggestions = true"
          class="form-control w-75"
      />

      <!-- Color input picker for hex color selection -->
      <input
          type="color"
          :value="currentColor"
          @input="updateColorPicker"
          class="form-control color-picker"
      />

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
  name: 'ColorPickerInput',
  props: {
    modelValue: {
      type: Object,
      required: true,
    },
    colorMap: {
      type: Object,
      default: () => ({}), // Map of SCSS variable names to hex values
    },
  },
  data() {
    return {
      inputValue: this.modelValue.value || this.modelValue.default || '#000000',
      locked: false, // Track locked state
      showSuggestions: false, // Control visibility of autocomplete dropdown
    };
  },
  computed: {
    // Filtered suggestions based on the user's input
    filteredSuggestions() {
      return Object.keys(this.colorMap).filter((variable) =>
          variable.toLowerCase().includes(this.inputValue.toLowerCase())
      );
    },
    // Computed color value for the color picker, using `value` if set, otherwise falling back to `default`
    currentColor() {
      return this.isHexColor(this.modelValue.value) ? this.modelValue.value : this.modelValue.default || '#000000';
    },
  },
  watch: {
    // Watch for changes in modelValue and update inputValue accordingly
    modelValue: {
      deep: true,
      handler(newValue) {
        this.inputValue = newValue.value || newValue.default || '#000000';
      },
    },
  },
  methods: {
    onInput() {
      // Show suggestions when typing in the text input
      this.showSuggestions = true;
      this.updateModelWithInput(this.inputValue);
    },
    selectSuggestion(variable) {
      // Update input with hex value of selected SCSS variable and close dropdown
      const hex = this.colorMap[variable]?.default;
      if (hex && this.isHexColor(hex)) {
        this.inputValue = hex;
        this.updateModelWithInput(hex);
      }
      this.showSuggestions = false;
    },
    updateColorPicker(event) {
      // Only update the input and model if it's a valid hex color
      const color = event.target.value;
      if (this.isHexColor(color)) {
        this.inputValue = color;
        this.updateModelWithInput(color);
      }
    },
    updateModelWithInput(value) {
      // Update modelValue.value with the provided value (either hex or SCSS variable)
      this.modelValue.value = value;
      this.$emit('update:modelValue', this.modelValue);
    },
    toggleLock() {
      // Toggle lock and emit lock state to parent
      this.locked = !this.locked;
      this.$emit('update-lock', { id: this.id, locked: this.locked });
    },
    isHexColor(value) {
      // Check if the value is a valid hex color
      return /^#[0-9A-Fa-f]{6}$|^#[0-9A-Fa-f]{3}$/.test(value);
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
</style>
