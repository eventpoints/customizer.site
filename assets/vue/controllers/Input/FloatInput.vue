<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="modelValue.label">{{ modelValue.label }}</label>
    <div class="input-group w-100">
      <!-- Input for float values -->
      <input
          type="number"
          step="0.01"
          class="form-control"
          v-model="computedFloat"
          @input="emitUpdatedValue"
          aria-label="Float value input"
          placeholder="Enter a float value"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "FloatInput",
  props: {
    modelValue: {
      type: Object,
      required: true,
    },
  },
  computed: {
    // Computed property to handle the float value
    computedFloat: {
      get() {
        return this.modelValue.value !== null && this.modelValue.value !== undefined
            ? parseFloat(this.modelValue.value)
            : parseFloat(this.modelValue.default) || 0;
      },
      set(newValue) {
        this.$set(this.modelValue, "value", newValue);
      },
    },
  },
  methods: {
    emitUpdatedValue() {
      this.$emit("update:modelValue", this.modelValue);
    },
  },
};
</script>

<style scoped>
</style>
