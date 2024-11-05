<template>
  <div class="form-check form-switch">
    <!-- Checkbox input for boolean switch -->
    <input
        class="form-check-input"
        type="checkbox"
        :id="id"
        v-model="modelValue.default"
        @change="emitUpdatedValue"
        role="switch"
    />
    <!-- Label for the switch -->
    <label class="form-check-label" :for="id">{{ label }}</label>
  </div>
</template>

<script>
export default {
  name: 'SwitchInput',
  props: {
    id: String,
    label: String,
    modelValue: {
      type: Object,
      required: true,
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
