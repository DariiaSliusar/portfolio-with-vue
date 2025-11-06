<script setup>
import {ref, reactive} from "vue";
import EventBus from "../../../lib/EventBus.js";

const form = reactive({
    id: '',
    title: '',
    icon: '',
    description: ''
})

let errors = ref([]);

const showModal = ref(false);
const openModal = () => {
    showModal.value = true;
}

const closeModal = () => {
    showModal.value = false;
    form.title = '';
    form.icon = '';
    form.description = '';
}

const handleSave = async () => {
    await axios.post('/api/services', form)
        .then(({data}) => {
        closeModal();
        toast.fire({
            icon: 'success',
            title: 'Service added successfully!'
        })
        EventBus.emit('show-services');
        })
        .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        });
}
</script>

<template>
    <button class="open-modal" @click="openModal">New Service</button>
    <!-------------- SERVICES MODAL --------------->
    <div class="modal " :class="showModal ? 'show' : '' ">
        <div class="modal-content">
            <h2>Create Service</h2>
            <span class="close-modal" @click="closeModal">×</span>
            <hr>
            <div>
                <label>Service Name</label>
                <span v-if="errors.title" style="color:red;">{{ errors.title }}</span>
                <input type="text" v-model="form.title"/>

                <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                                Awesome)</span></label>

                <input type="text" v-model="form.icon"/>

                <label>Description</label>
                <textarea cols="10" rows="5" v-model="form.description"></textarea>
            </div>
            <hr>
            <div class="modal-footer">
                <button @click="closeModal">
                    Cancel
                </button>
                <button class="secondary" @click="handleSave">
                    <span><i class="fa fa-spinner fa-spin"></i></span>
                    Save
                </button>
            </div>

        </div>
    </div>
</template>
