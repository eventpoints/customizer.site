<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="id">{{ label }}</label>
    <div class="input-group w-100">
      <!-- Input for the size value with unit -->
      <input
          type="text"
          class="form-control"
          v-model="modelValue.default"
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
        {{ extractUnit(modelValue.default) }}
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
    id: String,
    label: String,
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
  methods: {
    emitUpdatedValue() {
      // Emit the updated value object directly back to the parent
      this.$emit("update:modelValue", this.modelValue);
    },
    selectUnit(unit) {
      // Extract the numeric part and combine it with the selected unit
      const valueWithoutUnit = parseFloat(this.modelValue.default);
      this.modelValue.default = `${valueWithoutUnit}${unit}`;
      this.emitUpdatedValue();
    },
    extractUnit(value) {
      // Extract and display the current unit from the value
      const match = value.match(/[a-zA-Z%]+$/);
      return match ? match[0] : "px";
    },
  },
};
</script>

<style scoped>
</style>
