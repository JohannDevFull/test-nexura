<template>

    <AppLayout title="Crear usuario">
	  	<main>
		    <div class="row">
          		<div class="col-12">
            
		            <div class="card">
		                
		                <div class="card-header">
		                    <h3 class="card-title">Crear Usuario</h3>

		                    <div class="card-tools" style="width: 160px">
		                        

		                        <div 
		                            class="input-group input-group-sm" 
		                            style="width: 150px;display: inline-flex;"
		                            
		                            >

		                            <Link class="btn btn-default" href="/users/create" > 
		                                <i class="fas fa-backspace pr-1"></i>Regresar
		                            </Link>

		                        </div>

		                    </div>
		                </div>
				      	
				      	<div class="card-body " >
					      	
					      	<div class="col-12 ">
						        <h4 class="mb-3">Información usuario</h4>
						        
						        <form id="form_user" class="needs-validation" >
						          
						          	<div class="row g-3 mb-3">

							          	<div class="col-6">
							              	<label for="username" class="form-label">
							              		Username
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<div class="input-group has-validation">
							                	<span class="input-group-text"><i class="fas fa-user"></i></span>
							                	<input 
							                		id="user_name" 
							                		name="user_name" 
							                		type="text" 
							                		class="form-control" 
							                		placeholder="Username"
							                		v-model="form_user.user_name"
							                		>
								              	<div class="invalid-feedback">
								                  El campo "Username" es obligatorio.
								                </div>
								            </div>
							            </div>

							            <div class="col-6">
							              	<label for="email" class="form-label">
							              		Email
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<div class="input-group has-validation">
							                	<span class="input-group-text">@</span>
								              	<input 
								              		id="email" 
								              		name="email" 
								              		type="email" 
								              		class="form-control" 
								              		placeholder="you@example.com"
								              		v-model="form_user.email"
								              		>
								              	<div class="invalid-feedback">
								                	Por favor ingresar un correo electronico valido.
								              	</div>
								            </div>
							            </div>
							            
							            <div class="col-sm-6">
							              	<label for="firstName" class="form-label">
							              		Nombres
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<input 
									          	id="name"  
									          	type="text" 
									          	class="form-control was-validated" 
									          	placeholder="Nombre" 
									          	name="name"
									          	v-model="form_user.name" 
									          	required
									          	>
							              	<div class="invalid-feedback">
							                	Valid first name is required.
							              	</div>
							            </div>

							            <div class="col-sm-6">
							              	<label for="lastName" class="form-label">
							              		Apellidos
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<input 
							              		id="lastName" 
							              		name="last_name" 
							              		type="text" 
							              		class="form-control" 
							              		placeholder=""
							              		v-model="form_user.last_name"  
							              		>
							              <div class="invalid-feedback">
							                Valid last name is required.
							              </div>
							            </div>

							            <div class="col-sm-6">
							              	<label for="password" class="form-label">
							              		Contraseña
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<input 
								              	id="password"  
								              	name="password"
								              	type="password" 
								              	class="form-control was-validated" 
								              	placeholder="+++++++" 
								              	v-model="form_user.password" 
								              	>
							              	<div class="invalid-feedback">
							                	Valid first name is required.
							              	</div>
							            </div>

							            <div class="col-sm-6">
							              	<label for="password_confirmation" class="form-label">
							              		Confirmar contraseña
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<input 
							              		id="password_confirmation" 
							              		name="password_confirmation" 
							              		type="password" 
							              		class="form-control" 
							              		placeholder="" 
							              		v-model="form_user.password_confirmation" 
							              		required
							              		>
						              		<div class="invalid-feedback">
						                		Valid last name is required.
						              		</div>
							            </div>

							            <div class="col-6">
							              	<label for="country" class="form-label">
							              		Roles
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<!-- <v-select 
							              		multiple 
							              		v-model="form_user.roles_user" 
							              		:options="roles" 
							              		label="name" 
							              		append-to-body
							              		:calculate-position="withPopper"
							              		>
											</v-select> -->
	  
							              	<div id="rol_validate" class="invalid-feedback">
							                	Seleccione algun rol. {{validateRolesComputed}}
							              	</div>
							            </div>

							            <div class="col-sm-6">
							              	<label for="phone" class="form-label">
							              		Telefono
							              		<span class="text-muted">(Optional)</span>
							              	</label>
							              	<input 
								              	id="phone" 
								              	name="phone" 
								              	type="text" 
								              	class="form-control" 
								              	placeholder="+57 3118523576" 
							              	>
							              	<div class="invalid-feedback">
							                	Valid last name is required.
							              	</div>
							            </div>

						          	</div>

						          	<div class="d-flex justify-content-center mb-3">
										<ul class="list-group">
											<li class="list-group-item list-group-item-danger" v-for="( item , i ) in errors" :key="i">
												{{item}}
											</li>
										</ul>
						          	</div>

						          	<div class="d-flex justify-content-center">
						          		<button class="m-auto btn btn-primary btn-lg" type="submit">Crear</button>
						          	</div>
						          		

						        </form>
					        
					      	</div>
					      	
					    </div>
				    </div>
				</div>
			</div>
	  	</main>
    </AppLayout>
	
</template>

<style>
	.v-select.drop-up.vs--open .vs__dropdown-toggle {
		position: relative;
		right: 0px;
		border-radius: 0 0 4px 4px;
		border-top-color: transparent;
		border-bottom-color: rgba(60, 60, 60, 0.26);
	}

	[data-popper-placement='top'] {
		border-radius: 4px 4px 0 0;
		border-top-style: solid;
		border-bottom-style: none;
		box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.15);
	}

	.error-j{
		display: block;
	}
	.v-select-error{
		border: 1px red solid;
	}
</style>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import Swal from 'sweetalert2'

export default {
	props:['can','roles'],
    components: {
        AppLayout,
        Swal
    },
    data() {
        return {

        	Toast:'',
          	count: 0,
			form_user:{
				user_name: '',
				name: '',
				last_name: '',
				password: '',
				password_confirmation: '',
				email: '',
				phone:'',
		      	roles_user: []
		    },
			placement: 'top',

			errors:[]	      	
        }
    },
    mounted(){
    	this.Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 4000
	    });

    	$.validator.setDefaults({
		    submitHandler:  ()=> {
		      	this.store()
		    }
		});
		  
		$('#form_user').validate({
		    rules: {
		    	user_name: {
			        required: true
			    },
			    name: {
			        required: true
			    },
		    	last_name: {
			        required: true
			    },
		      	email: {
		        	required: true,
		        	email: true,
		      	},
				password: {
					required: true,
					minlength: 5
				},
				password_confirmation: {
					required: true,
					minlength: 5
				},
				roles_user:{
					required: true
				}
		    },
		    errorElement: 'span',
		    errorPlacement:  (error, element) => {
		    	if (this.form_user.roles_user.length == 0)
		     	{
		     		$("#rol_validate").addClass('error-j');
		     		$("#vs1__combobox").addClass('v-select-error');
		     	}
		      	error.addClass('invalid-feedback');
		      	element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {

		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {

		      $(element).removeClass('is-invalid');
		    }
		});
    },
    computed:{
    	validateRolesComputed()
    	{
    		let x = this.form_user.roles_user.length;
	    	if ( x == 0)
	     	{

	     	}
	     	else
	     	{
	     		$("#rol_validate").removeClass('error-j');
	     		$("#vs1__combobox").removeClass('v-select-error');
	     	}

	     	return x;
    	}
    },
    methods:{
    	async store()
    	{
	     	this.errors=[];

	     	if (this.form_user.roles_user.length == 0)
	     	{
	     	}
	     	else
	     	{
	            await axios.post('../users',this.form_user)
	            .then(response => {
	            	if (response.data.status == 'ok')
	            	{
		            	Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Your work has been saved',
							showConfirmButton: false,
							timer: 1500
						})
	            	}
	            	else
	            	{
	            		this.Toast.fire({
					        icon: 'warning',
					        title: 'Error de validación.'
					    });

					    this.errors = response.data.errors;
	            	}
	            })
	            .catch(error => {
	            	this.Toast.fire({
				        icon: 'warning',
				        title: 'Error del servidor.'
				    })
	            });
	     	}
    	},

    	withPopper(dropdownList, component, { width }) 
    	{
    		dropdownList.style.width = width

		    const popper = createPopper(component.$refs.toggle, dropdownList, {
		        placement: this.placement,
		        modifiers: [
		          {
		            name: 'offset',
		            options: {
		              	offset: [0, -1],
		            },
		          },
		          {
		            name: 'toggleClass',
		            enabled: true,
		            phase: 'write',
		            fn({ state }) {
		              component.$el.classList.toggle(
		                'drop-up',
		                state.placement === 'top'
		              )
		            },
		          },
		        ],
		    });

	      return () => popper.destroy()
	    }
    }
}
	
</script>