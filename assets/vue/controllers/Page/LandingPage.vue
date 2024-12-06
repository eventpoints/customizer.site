<template>
  <div class="container">
    <div class="row justify-content-center g-3 mt-3">
      <div class="col-12 col-md-6">
        <div class="row justify-content-center g-3">
          <div class="col-12">
            <div class="card p-5 text-center">
              <h1 class="text-body-emphasis">Customizer Site</h1>
              <p class="col-lg-8 mx-auto mb-4">
                Create a fully customized version of Bootstrap in minutes! With our tool, you can effortlessly tweak
                Bootstrap’s colors, typography, and component styles to perfectly match your project’s design. Automate
                the configuration.
              </p>
              <div class="input-group mb-4">
                <div class="form-floating">
                  <input type="number" class="form-control" id="projects" v-model="projects"
                         placeholder="Avg Projects /mo">
                  <label for="projects">Avg Projects /mo</label>
                </div>
                <div class="form-floating">
                  <input type="number" disabled class="form-control" id="hourlyCost" v-model="hourlyCost"
                         placeholder="Avg dev rate /hr (EU)">
                  <label for="hourlyCost">Avg dev rate /hr (EU)</label>
                </div>
                <div class="form-floating">
                  <input type="number" disabled class="form-control" id="configTime" v-model="configTime"
                         placeholder="Avg Config Bootstrap /hr">
                  <label for="configTime">Avg Config Bootstrap /hr</label>
                </div>
              </div>
              <div>
                <div>
                  <div class="h2 text-success">€{{ formattedAnnualSavings }}</div>
                  <div class="lead">Approximate savings per year</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <h3 class="text-body-emphasis mt-4">Compare Plans</h3>

            <div class="table-responsive mb-5">
              <table class="table text-center">
                <thead>
                <tr>
                  <th style="width: 34%;"></th>
                  <th style="width: 22%;">Free</th>
                  <th style="width: 22%;">Enterprise</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <th scope="row" class="text-start">Unlimited Configuration</th>
                  <td><i class="bi bi-check2 fs-4 text-success"></i></td>
                  <td><i class="bi bi-check2 fs-4 text-success"></i></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">AI Configuration Assistant</th>
                  <td></td>
                  <td><i class="bi bi-check2 fs-4 text-success"></i></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Unlimited Projects</th>
                  <td></td>
                  <td><i class="bi bi-check2 fs-4 text-success"></i></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Unlimited File Download</th>
                  <td><i class="bi bi-check2 fs-4 text-success"></i></td>
                  <td><i class="bi bi-check2 fs-4 text-success"></i></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">CDN Access for Automation</th>
                  <td></td>
                  <td><i class="bi bi-check2 fs-4 text-success"></i></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="vstack gap-3 sticky-top">
          <div class="card text-center ">
            <div class="card-header bg-white py-3">
              <h4 class="my-0 fw-normal">Free</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title py-3">€0<small class="text-body-secondary fw-light">/mo</small>
              </h1>
              <a href="/app" class="btn btn-secondary px-5" type="button">
                Start Customizing
              </a>
            </div>
          </div>
          <div class="card  text-center border-primary">
            <div class="card-header py-3 text-white">
              <h4 class="my-0 fw-bold text-primary">Enterprise</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title py-3">€12<small class="text-body-secondary fw-light">/mo</small>
              </h1>
              <div class="vstack gap-3">
                <div class="form-floating">
                  <input type="email" class="form-control" :class="{'is-invalid': !isEmailValid && email !== ''}"
                         id="email-address" v-model="email"
                         placeholder="E-mail Address">
                  <label for="email-address">E-mail Address</label>
                </div>
                <button @click="sendRegistrationEmail" class="btn btn-primary w-100" type="button">
                  Purchase Now
                </button>
                <div class="text-center">
                  <a href="#" class="link-dark">existing customer</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="login-response-modal" class="modal fade" tabindex="-1" aria-labelledby="loginResponseModalLabel"
       aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center">
          <div>
            <i class="bi bi-check-circle-fill fs-1 text-success"></i>
          </div>
          <div>
            Please check your email account to continue to payment processing.
          </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {ref, computed, onMounted, onUnmounted} from 'vue';
import {store} from "../../Store/store";
import axios from "axios";
import {Modal} from "bootstrap";

export default {
  setup() {
    const email = ref('');           // Number of projects per month
    const projects = ref(15);           // Number of projects per month
    const hourlyCost = ref(67.23);      // Average hourly cost in euros
    const configTime = ref(3);          // Average hours spent on configuring Bootstrap per project
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    const isEmailValid = computed(() => {
      return emailRegex.test(email.value);
    });

    const showModal = (() => {
      const modalElement = document.getElementById('login-response-modal');
      const modal = new Modal(modalElement, {
        keyboard: false,
        backdrop: 'static',
        focus: true,
      });
      modal.show();
    });

    const setRandomVariables = () => {
      store.setRandomVariables();
      compile();
    };

    // Function to send registration email
    const sendRegistrationEmail = async () => {
      if (!email.value.trim()) {
        alert("Email cannot be empty.");
        return;
      }

      if (!isEmailValid.value) {
        alert("Please enter a valid email address.");
        return;
      }

      try {
        const response = await axios.get('api/v1/auth/login', {
          params: {
            email: email.value
          }
        }).then((response) => {
          console.log(response.data)
          showModal();
        });
      } catch (error) {
        console.error('Error during email registration:', error.response?.data || error.message);
        alert("There was an error processing your request. Please try again.");
      }
    };

    const compile = async () => {
      await axios.post('/api/v1/compile/bootstrap53', store.variables)
          .then((response) => {
            store.css = response.data;
            applyCss(store.css); // Apply the CSS after compiling
          })
          .catch((error) => {
            console.error('Compilation error:', error.response?.data?.message || 'An error occurred.');
          })
          .finally(() => {
            store.isLoading = false;
          });
    };

    const applyCss = (css) => {
      let styleTag = document.getElementById("dynamic-styles");
      if (!styleTag) {
        // Create a style tag if it doesn't exist
        styleTag = document.createElement("style");
        styleTag.id = "dynamic-styles";
        document.head.appendChild(styleTag);
      }
      styleTag.innerHTML = css;
    };

    const annualSavings = computed(() => {
      return (hourlyCost.value * configTime.value) * projects.value * 12;
    });


    const formattedAnnualSavings = computed(() => {
      return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      }).format(annualSavings.value);
    });

    // Add keydown event listener for space bar
    const handleKeydown = (event) => {
      if (event.code === "Space") {
        event.preventDefault();
        setRandomVariables();
      }
    };

    onMounted(async () => {
      await axios.get('/api/v1/inputs/bootstrap53').then((response) => {
        store.variables = response.data;
      });
      window.addEventListener("keydown", handleKeydown);
    });

    onUnmounted(() => {
      window.removeEventListener("keydown", handleKeydown);
    });

    return {
      projects,
      hourlyCost,
      configTime,
      store,
      formattedAnnualSavings,
      email,
      isEmailValid,
      sendRegistrationEmail,
    };
  },
};
</script>

<style lang="css">
</style>
