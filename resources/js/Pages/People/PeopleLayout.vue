<template>
  <AuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-3xl">Personas</h3>
            <hr class="mb-4" />
            <div class="grid grid-cols-2 gap-2">
              <Form
                @submit="onSubmit"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
              >
                <div>
                  <label>Nombre y Apellido</label>
                  <Field
                    class="w-full"
                    type="text"
                    name="names"
                    id=""
                    :rules="validateNames"
                  />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                <div>
                  <label>Nacimiento</label>
                  <Field class="w-full" v-model="fecha" type="date" name="born" id="" 
                  @change="onDateChange()"
                  :rules="validateBorn" />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                
                <div>
                  <label>Edad</label> : <label>{{age}}</label>
                </div>
                <div>
                  <label>Telefono</label>
                  <Field class="w-full" type="text" name="phone" id="" :rules="validatePhone" />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                <div>
                  <label>Inscripción</label>
                  <Field class="w-full" type="date" name="inscription" id="" :rules="validateInscription" />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                <div>
                  <button
                    class="
                      mt-3
                      bg-blue-500
                      hover:bg-blue-700
                      text-white
                      font-bold
                      py-2
                      px-4
                      rounded-full
                    "
                  >
                    Guardar
                  </button>
                </div>
              </Form>
              <!-- form edit -->
              <Form
                @submit="onSubmitUpdate"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                v-if="people"
              >
                <div>
                  <label>Nombre y Apellido</label>
                  <Field
                    class="w-full"
                    type="text"
                    name="names"
                    :value="people.names"
                    id=""
                    :rules="validateNames"
                  />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                <div>
                  <label>Nacimiento</label>
                  <Field class="w-full" v-model="fecha_edit" type="date" name="born" id="" 
                  
                  :rules="validateBorn" 
                  />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                
                <div>
                  <label>Edad</label> : <label>{{age_edit}}</label>
                </div>
                <div>
                  <label>Telefono</label>
                  <Field class="w-full" type="text" name="phone" id="" :rules="validatePhone" :value="people.phone" />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                <div>
                  <label>Inscripción</label>
                  <Field class="w-full" type="date" name="inscription" id="" :rules="validateInscription" 
                  :value="people.inscription"
                  />
                  <ErrorMessage as="div" name="names" v-slot="{ message }">
                    <p class="text-base text-rose-600">{{ message }}</p>
                  </ErrorMessage>
                </div>
                <div>
                  <button
                    class="
                      mt-3
                      bg-blue-500
                      hover:bg-blue-700
                      text-white
                      font-bold
                      py-2
                      px-4
                      rounded-full
                    "
                  >
                    Guardar
                  </button>
                </div>
              </Form>
            </div>
          </div>
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-3xl">Personas</h3>
            <hr class="mb-4" />
            <div class="grid grid-cols">
              <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <table class="table-auto w-full">
                  <thead>
                    <tr>
                      <th class="px-4 py-2">Nombre</th>
                      <th class="px-4 py-2">Nacimiento</th>
                      <th class="px-4 py-2">Telefono</th>
                      <th class="px-4 py-2">Inscripción</th>
                      <th class="px-4 py-2">Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr v-for="person in peoples" :key="person.id">
                      <td class="border px-4 py-2">{{ person.names }}</td>
                      <td class="border px-4 py-2">{{ person.born }}</td>
                      <td class="border px-4 py-2">{{ person.phone }}</td>
                      <td class="border px-4 py-2">{{ person.inscription }}</td>
                      <td class="border px-4 py-2">
                        <Link
                          class="
                            bg-blue-500
                            hover:bg-blue-700
                            text-white
                            font-bold
                            py-2
                            px-4
                            rounded-full
                          "
                          :href="route('people.edit',{people:person.id})"
                        >
                          Editar
                        </Link>
                        <button
                          class="
                            bg-red-500
                            hover:bg-red-700
                            text-white
                            font-bold
                            py-2
                            px-4
                            rounded-full
                          "
                        >
                          Eliminar
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import moment from "moment";
import { ref, computed,toRefs } from "vue";


export default {
  components: {
    AuthenticatedLayout,
    Form,
    Field,
    ErrorMessage,
    Link
  },
  props: {
    peoples: Array,
    people: Object,
  },
  setup(props) {
    const fecha = ref('');
    const fecha_edit = ref('');
    const age = ref(0);

  
    fecha_edit.value = props.people.born;

    const age_edit = computed({
        get(){
          const born = moment(props.people.born);
          const today = moment();
          return today.diff(born, "years");
        },
        set(value) {
          age_edit.value = value;
        }});

    const onDateChange = (e) => {
      const born = moment(fecha.value);
      const today = moment();
      age.value = today.diff(born, "years");
    };
    // const onDateChangeEdit = (e) => {
    //   const born = moment(fecha_edit.value);
    //   const today = moment();
    //   let edad = today.diff(born, "years");
    //   return age_edit.value = today.diff(born, "years");
    //   console.log(age_edit.value,edad)
    // };

    return {
      age,
      fecha,
      fecha_edit,
      fecha_edit,
      age_edit,
      // fecha_edit:computed(()=> {
      //   return moment(props.people.born).format('YYYY-MM-DD')
      // }),
      
      onDateChange,
      
      onSubmit(values) {
        console.log(values);
        Inertia.post('/people', values)
      },
      onSubmitUpdate(values) {
        Inertia.put(route('people.update',{people:props.people}), values)
      },
      validateNames(value) {
        if (!value) {
          return "This field is required";
        }

        return true;
      },
      validateBorn(value) {
        if (!value) {
          return "This field is required";
        }

        return true;
      },
      validatePhone(value) {
        if (!value) {
          return "This field is required";
        }

        return true;
      },
      validateInscription(value) {
        if (!value) {
          return "This field is required";
        }

        return true;
      },
    };
  },
};
</script>


<style>
</style>