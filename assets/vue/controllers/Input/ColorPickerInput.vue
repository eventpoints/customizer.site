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
    id: String,
    label: String,
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
      inputValue: this.modelValue.default || '#000000',
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
    // Computed color value specifically for the color picker, dynamically resolving if inputValue is a variable
    currentColor() {
      if (this.isColorVariable(this.modelValue.default)) {
        const variable = this.modelValue.default;
        return this.colorMap[variable]?.default || '#000000';
      }
      return this.isHexColor(this.modelValue.default) ? this.modelValue.default : '#000000';
    },
  },
  watch: {
    // Deep watch to track any changes to modelValue, including external changes like color randomizer
    modelValue: {
      deep: true,
      handler(newValue) {
        this.inputValue = newValue.default;
      },
    },
    // Watch colorMap to react to any changes in referenced colors
    colorMap: {
      deep: true,
      handler() {
        if (this.isColorVariable(this.modelValue.default)) {
          this.$emit('update:modelValue', this.modelValue); // Trigger reactivity on referenced color change
        }
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
      // Store the variable name as default (e.g., "$primary") for dynamic referencing
      this.inputValue = variable;
      this.updateModelWithInput(variable);
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
      // Update modelValue.default with either a hex color or SCSS variable
      this.modelValue.default = value;
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
    isColorVariable(value) {
      // Check if the value is an SCSS variable (starts with "$")
      return typeof value === 'string' && value.startsWith('$');
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
