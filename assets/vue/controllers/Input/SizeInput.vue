<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="modelValue.title">{{ modelValue.label }}</label>
    <div class="input-group w-100">
      <!-- Input for the size value with unit -->
      <input
          :id="modelValue.title"
          type="text"
          class="form-control"
          v-model="computedSize"
          @input="emitUpdatedValue"
          aria-label="Size value input"
          placeholder="Size"
      />
      <button
          class="btn btn-light dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
      >
        {{ extractUnit(computedSize) }}
      </button>

      <!-- Dropdown menu for selecting a unit -->
      <ul class="dropdown-menu dropdown-menu-end">
        <li
            v-for="unit in units"
            :key="unit"
            @click="selectUnit(unit)"
        >
          <a class="dropdown-item" href="#">{{ unit }}</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "SizeInput",
  props: {
    modelValue: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      units: ["px", "%", "em", "rem", "vw", "vh"], // List of CSS units
    };
  },
  computed: {
    // Computed property for size with unit, falling back to default if value is null
    computedSize: {
      get() {
        return this.modelValue.value || this.modelValue.default || "0px";
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
    selectUnit(unit) {
      // Extract the numeric part of the computed size and combine it with the selected unit
      const valueWithoutUnit = parseFloat(this.computedSize);
      this.computedSize = `${valueWithoutUnit}${unit}`;
      this.emitUpdatedValue();
    },
    extractUnit(value) {
      // Extract the unit from the given value
      const match = value.match(/[a-zA-Z%]+$/);
      return match ? match[0] : "px";
    },
  },
};
</script>

<style scoped>
</style>
