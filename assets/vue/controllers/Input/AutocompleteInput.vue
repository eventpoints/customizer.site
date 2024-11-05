<template>
  <div class="autocomplete">
    <label class="fw-bold text-muted text-capitalize" :for="id">{{ label }}</label>
    <input
        type="text"
        class="form-control"
        :id="id"
        v-model="inputValue"
        @input="onInput"
        @focus="showSuggestions = true"
        placeholder="Enter color or choose a variable"
    />
    <!-- Suggestions dropdown -->
    <ul v-if="showSuggestions && filteredSuggestions.length" class="dropdown-menu show">
      <li
          v-for="(suggestion, index) in filteredSuggestions"
          :key="index"
          @click="selectSuggestion(suggestion)"
          class="dropdown-item"
          style="cursor: pointer;"
      >
        {{ suggestion }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "AutocompleteInput",
  props: {
    id: String,
    label: String,
    modelValue: {
      type: Object,
      required: true,
    },
    suggestions: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      inputValue: this.modelValue.default, // Bind to default color value
      showSuggestions: false, // Control visibility of the dropdown
    };
  },
  computed: {
    // Filter suggestions based on input
    filteredSuggestions() {
      return this.suggestions.filter((suggestion) =>
          suggestion.toLowerCase().includes(this.inputValue.toLowerCase())
      );
    },
  },
  methods: {
    onInput() {
      // Emit the input value back to parent
      this.modelValue.default = this.inputValue;
      this.$emit("update:modelValue", this.modelValue);
    },
    selectSuggestion(suggestion) {
      // Update input with selected suggestion and close dropdown
      this.inputValue = suggestion;
      this.modelValue.default = suggestion;
      this.$emit("update:modelValue", this.modelValue);
      this.showSuggestions = false;
    },
  },
  watch: {
    modelValue: {
      immediate: true,
      handler(newValue) {
        this.inputValue = newValue.default;
      },
    },
  },
};
</script>

<style scoped>
.dropdown-menu {
  max-height: 150px;
  overflow-y: auto;
}
</style>