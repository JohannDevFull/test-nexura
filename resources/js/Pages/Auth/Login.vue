<template>
    
    <Head title="Log in" />

    <div class="login-box">

        <div class="card card-outline card-primary">
            
            <div class="card-header text-center">

                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    
                    <div class="input-group mb-3">
                        <input 
                            id="email"
                            v-model="form.email"
                            type="email"
                            required
                            autofocus 
                            class="form-control" 
                            placeholder="Email"
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input 
                            id="password"
                            v-model="form.password"
                            type="password"
                            required
                            autocomplete="current-password" 
                            class="form-control" 
                            placeholder="Password"
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                                <label class="flex items-center">
                                    <JetCheckbox v-model:checked="form.remember" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>

                            </div>
                        </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" :disabled="form.processing">
                            Sign In
                        </button>
                      </div>
                      <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                      <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                      <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        I forgot my password
                    </Link>
                </p>
                <p class="mb-0">
                    <Link v-if="canRegister" :href="route('register')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        Register a new membership
                    </Link>
                </p>
            </div>

        </div>
    </div>

</template>

<script setup>
    
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
    import JetButton from '@/Jetstream/Button.vue';
    import JetInput from '@/Jetstream/Input.vue';
    import JetCheckbox from '@/Jetstream/Checkbox.vue';
    import JetLabel from '@/Jetstream/Label.vue';
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

    import {  onMounted } from 'vue'

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });

    onMounted(() => {
        // login-page
        $("#body").addClass("login-page");
        setTimeout(()=>{
          
              if ($("#body").hasClass("login-page"))
              {
                   // location.reload();

              }
                  $("#body").addClass("login-page");

        },200);
    });

    const submit = () => {
        form.transform(data => ({
            ...data,
            remember: form.remember ? 'on' : '',
        })).post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };



</script>