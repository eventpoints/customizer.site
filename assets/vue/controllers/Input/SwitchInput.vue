<template>
  <div class="form-check form-switch">
    <!-- Checkbox input for boolean switch -->
    <input
        class="form-check-input"
        type="checkbox"
        :id="modelValue.label"
        v-model="computedValue"
        @change="emitUpdatedValue"
        role="switch"
    />
    <!-- Label for the switch -->
    <label class="form-check-label" :for="modelValue.label">{{ modelValue.label }}</label>
  </div>
</template>

<script>
export default {
  name: 'SwitchInput',
  props: {
    modelValue: {
      type: Object,
      required: true,
    },
  },
  computed: {
    // Computed property to access value or fallback to default
    computedValue: {
      get() {
        return this.modelValue.value ?? this.modelValue.default;
      },
      set(newValue) {
        this.$set(this.modelValue, 'value', newValue);
      },
    },
  },
  methods: {
    emitUpdatedValue() {
      this.$emit('update:modelValue', this.modelValue);
    },
  },
};
</script>

<style scoped>
</style>
