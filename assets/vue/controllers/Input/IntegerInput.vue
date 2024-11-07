<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="modelValue.label">{{ modelValue.label }}</label>
    <div class="input-group w-100">
      <!-- Input for integer values -->
      <input
          type="number"
          step="1"
          class="form-control"
          v-model="computedInteger"
          @input="emitUpdatedValue"
          aria-label="Integer value input"
          placeholder="Enter an integer"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "IntegerInput",
  props: {
    modelValue: {
      type: Object,
      required: true,
    },
  },
  computed: {
    // Computed property to handle integer values, defaulting if value is null
    computedInteger: {
      get() {
        return this.modelValue.value !== null && this.modelValue.value !== undefined
            ? parseInt(this.modelValue.value, 10)
            : parseInt(this.modelValue.default, 10) || 0;
      },
      set(newValue) {
        this.$set(this.modelValue, "value", parseInt(newValue, 10));
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
