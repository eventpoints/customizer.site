import '../scss/custom.variables.scss';
import '../scss/custom-bootstrap.scss';

document.querySelectorAll('.color-picker').forEach((picker) => {
    picker.addEventListener('input', (event) => {
        const variable = event.target.dataset.variable;
        const value = event.target.value;

        updateScssVariable(variable, value);
    });
});

function updateScssVariable(variable, value) {
    document.documentElement.style.setProperty(`--${variable}`, value);
}
