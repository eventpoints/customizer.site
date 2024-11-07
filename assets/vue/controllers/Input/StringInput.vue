<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="modelValue.label">{{ modelValue.label }}</label>
    <div class="input-group w-100">
      <!-- Input for string values -->
      <input
          type="text"
          class="form-control"
          v-model="computedString"
          @input="emitUpdatedValue"
          aria-label="String value input"
          placeholder="Enter a text value"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "StringInput",
  props: {
    modelValue: {
      type: Object,
      required: true,
    },
  },
  computed: {
    // Computed property for string value, using modelValue.value or falling back to modelValue.default
    computedString: {
      get() {
        return this.modelValue.value !== null && this.modelValue.value !== undefined
            ? this.modelValue.value
            : this.modelValue.default || "";
      },
      set(newValue) {
        this.$set(this.modelValue, "value", newValue);
      },
    },
  },
  methods: {
    emitUpdatedValue() {
      // Emit the updated modelValue object to the parent
      this.$emit("update:modelValue", this.modelValue);
    },
  },
};
</script>

<style scoped>
</style>
