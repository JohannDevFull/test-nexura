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
						        <div class="alert alert-info" role="alert">
							        Los campos con <span class="text-danger">(*)</span> son obligatorios.
								</div>

						        <form id="form_user" class="needs-validation">

						        	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Nombres completos
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<input 
							              		id="name" 
							              		name="name"
							              		type="text" 
							              		class="form-control" 
							              		placeholder="Nombre completo del usuario"
							              		v-model="form_user.name"
							              		>
							              	<div class="invalid-feedback">
							                	Campo obligatorio.
							              	</div>
									    </div>
								  	</div>
								  
								  	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Correo electronico
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
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

								  	<fieldset class="form-group row">
									    <label for="sex" class="col-sm-3 col-form-label">
									    	Sexo
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<div class="form-check">
										        <input 
										        	class="form-check-input" 
										        	type="radio" 
										        	name="gridRadios" 
										        	id="gridRadios1" 
										        	value="M" 
										        	v-model="form_user.sex"
										        	required 
										        	>
										        <label id="sex" class="form-check-label" for="gridRadios1">
										          Masculino
										        </label>
									      	</div>
									      	<div class="form-check">
										        <input 
										        	class="form-check-input" 
										        	type="radio" 
										        	name="gridRadios" 
										        	id="gridRadios2" 
										        	value="F"
										        	v-model="form_user.sex"
										        	required 
										        	>
										        <label id="sex" class="form-check-label" for="gridRadios2">
										          Famenino
										        </label>
									      	</div>
									      	<div class="invalid-feedback" id="error-ratios">
							                	Campo obligatorio. {{validateSexComputed}}
							              	</div>
									    </div>
								  	</fieldset>

								  	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Area
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
										  	<div class="input-group mb-3">
											  	<select 
											  		id="area"
											  		name="area" 
											  		class="form-control custom-select"
											  		v-model="form_user.area_id" 
											  		required
											  		>
												    <option disabled>Selecione un area</option>
												    <option value="1" v-for="(item,i) in areas">
												    	{{item.name}}
												    </option>
											  	</select>
											  	<div class="input-group-append">
											    	<label class="input-group-text" for="inputGroupSelect02">
											    		Opciones
											    	</label>
											  	</div>
								              	<div class="invalid-feedback">
								                	Campo obligatorio.
								              	</div>
											</div>
									    </div>
								  	</div>

								  	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Descripción
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
								  			<textarea 
								  				id="description" 
								  				name="description" 
								  				class="form-control" 
								  				v-model="form_user.description" 
								  				rows="3"
								  				>
								  				
								  			</textarea>
								  			<div class="invalid-feedback">
							                	Campo obligatorio.
							              	</div>
									    </div>
									</div>

									<fieldset class="form-group row">
									    <label for="sex" class="col-sm-3 col-form-label">
									    	Roles
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<div class="form-check" v-for="(rol , i) in roles" :key="i">
										        <input 
										        	:id="'rol_'+i" 
										        	name="roles" 
										        	class="form-check-input" 
										        	type="checkbox" 
										        	:value="rol" 
										        	v-model="form_user.roles_user"
										        	>
										        <label class="form-check-label" :for="'rol_'+i">
										          {{rol}}
										        </label>
									      	</div>
									      	<div id="rol_validate" class="invalid-feedback">
							                	Seleccione algun rol. 
							                	<span class="d-hide">
							                		{{validateRolesComputed}}
							                	</span>
							              	</div>
									    </div>
								  	</fieldset>

								  	<div class="form-group row">
									    <label for="password" class="col-sm-3 col-form-label">
									    	Contraseña
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<input 
							              		id="password"  
								              	name="password"
								              	type="password" 
								              	class="form-control was-validated" 
								              	placeholder="*******" 
								              	v-model="form_user.password"
								              	required
							              		>
							              	<div class="invalid-feedback">
							                	Campo obligatorio.
							              	</div>
									    </div>
								  	</div>

								  	<div class="form-group row">
									    <label for="password_confirmation" class="col-sm-3 col-form-label">
									    	Confirmar contraseña
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<input 
							              		id="password_confirmation" 
							              		name="password_confirmation" 
							              		type="password" 
							              		class="form-control" 
								              	placeholder="*******" 
							              		v-model="form_user.password_confirmation" 
							              		required
							              		>
							              	<div class="invalid-feedback">
							                	Campo obligatorio.
							              	</div>
									    </div>
								  	</div>

								  	<div class="form-group row">
									    
									    <label for="password_confirmation" class="col-sm-3 col-form-label">
									    	Recibir boletín infomativo
									    </label>
									    <div class="col-sm-9">
									    	<div class="form-check">
										        <input 
										        	id="subscription"
										        	name="subscription"
										        	class="form-check-input" 
										        	type="checkbox" 
										        	v-model="form_user.subscription"
										        	>
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
								  


								  	<div class="form-group row">
									    <div class="col-sm-9">
									      <button type="submit" class="btn btn-primary">Crear usuario</button>
									    </div>
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

	.form-control.valid{
		display: block;
	    border-color: #28a745;
	    padding-right: calc(1.5em + 0.75rem)!important;
	    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e);
	    background-repeat: no-repeat;
	    background-position: right calc(0.375em + 0.1875rem) center;
	    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
	}
	#sex.valid{
		display: block;
	    color: #28a745;
	}
</style>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import Swal from 'sweetalert2'
import { Inertia } from '@inertiajs/inertia'

export default {
	props:['can','roles','areas'],
    components: {
        AppLayout,
        Swal,
        Inertia
    },
    data() {
        return {

        	Toast:'',
          	count: 0,
			form_user:{
				name: '',
				description: '',
				subscription: '',
				password: '',
				password_confirmation: '',
				email: '',
				area_id:'',
				sex:'',
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
			    name: {
			        required: true
			    },
		    	sex: {
			        required: true
			    },
		      	email: {
		        	required: true,
		        	email: true,
		      	},
				area_id: {
					required: true,
				},
				description: {
					required: true,
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
		     	}
		     	
		     	if (this.form_user.sex == '')
		     	{
		     		$("#error-ratios").addClass('error-j');
		     	}
		      	error.addClass('invalid-feedback');
		    },
		    highlight: function (element, errorClass, validClass) {


		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      
		      $(element).addClass('valid');
		      $(element).removeClass('is-invalid');
		    }
		});
    },
    computed:{
    	validateRolesComputed()
    	{
    		let x = this.form_user.roles_user.length;
	    	if ( x != 0)
	     	{
	     		$("#rol_validate").removeClass('error-j');
	     		x='';
	     	}
	     	else
	     	{
	     		console.log("Error ss")
	     	}

	     	return x;
    	},
    	validateSexComputed()
    	{
    		let x = this.form_user.sex;
	    	if ( x != '')
	     	{
	     		$("#error-ratios").removeClass('error-j');
	     		$("#sex").removeClass('error-j'); 
	     		$('.form-check-input').addClass('valid');
	     		x='';
	     	}

	     	return x;
    	}

    },
    methods:{
    	async store()
    	{
	     	this.errors=[];

	     	if (this.form_user.roles_user.length != 0)
	     	{
	            await axios.post('../users',this.form_user)
	            .then(response => {
	            	if (response.data.status == 'ok')
	            	{
		            	Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Usuario creado correctamente',
							showConfirmButton: false,
							timer: 1500
						});

	    				Inertia.visit('/users');
							
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
    	}
    }
}
	
</script>