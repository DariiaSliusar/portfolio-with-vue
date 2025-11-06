<script setup>

import {reactive} from "vue";
import EventBus from "../../../lib/EventBus.js";

const form = reactive({
    link: '',
    icon: '',
})

const handleSave = async () => {
    await axios.post('/api/medias', form )
        .then(({data}) => {
            toast.fire({
                icon: 'success',
                title: 'Social media added successfully!'
            })
            form.link = '',
            form.icon = '',
            EventBus.emit('show-medias')
        })
}
</script>

<template>
    <div class="social_table-heading">
        <p>Link</p>
        <span style="color:#006fbb;">(Find your icon class: Font Awesome)</span>
    </div>
    <div class="social_table-items">

        <input type="text" v-model="form.link" />

        <input type="text" v-model="form.icon" />
        <button @click="handleSave">
            Add Media
        </button>
    </div>
</template>
