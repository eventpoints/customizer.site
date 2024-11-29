<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="modelValue.label">{{ modelValue.label }}</label>
    <div class="input-group w-100">
      <!-- Input for the size value -->

      <input
          type="number"
          class="form-control"
          v-model="size"
          @input="updateSize"
          aria-label="Size value input"
          placeholder="Size"
      />
      <button
          class="btn btn-light dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
      >
        {{ unit }}
      </button>

      <!-- Dropdown menu for selecting a unit -->
      <ul class="dropdown-menu dropdown-menu-end">
        <li
            v-for="unitOption in units"
            :key="unitOption"
            @click="selectUnit(unitOption)"
        >
          <a class="dropdown-item">{{ unitOption }}</a>
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
      size: null, // Numeric part of the size
      unit: "px", // Default unit if none specified
    };
  },
  mounted() {
    // Initialize size and unit based on modelValue's default or value
    const initialSize = this.modelValue.value || this.modelValue.default || "0px";
    const match = initialSize.match(/^([\d.]+)([a-zA-Z%]+)$/);
    if (match) {
      this.size = parseFloat(match[1]);
      this.unit = match[2];
    } else {
      this.size = parseFloat(initialSize) || 0;
      this.unit = "px"; // Default to px if no unit is found
    }
  },
  methods: {
    updateSize() {
      // Update the model value with the current size and unit
      this.modelValue.value = `${this.size}${this.unit}`;
      this.$emit("update:modelValue", this.modelValue);
    },
    selectUnit(selectedUnit) {
      // Update the unit and emit the new combined value
      this.unit = selectedUnit;
      this.updateSize();
    },
  },
};
</script>

<style scoped>
</style>
