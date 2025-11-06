<script setup>
import Base from "../../layouts/admin/Base.vue";
import Form from "./Form.vue";
import {onMounted, ref} from "vue";
import EventBus from "../../../lib/EventBus.js";

let services = ref([])

onMounted(async () => {
    getServices()
})

EventBus.on('show-services', (() => {
    getServices()
}))

const getServices = async () => {
    await axios.get("/api/services")
        .then(({data}) => {
            // console.log('data', data)
            services.value = data.services
        })
}
</script>

<template>
    <Base/>

    <section class="services" id="services">
        <div class="titlebar">
            <h1>Services</h1>
            <Form/>
        </div>
        <div class="table">
            <div class="table-filter">
                <div>
                    <ul class="table-filter-list">
                        <li>
                            <p class="table-filter-link link-active">All</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-search">
                <div>
                    <select class="search-select" name="" id="">
                        <option value="">Filter Service</option>
                    </select>
                </div>
                <div class="relative">
                    <input class="search-input" type="text" name="search" placeholder="Search Service...">
                </div>
            </div>
            <div class="service_table-heading">
                <p>Title</p>
                <p>Icon</p>
                <p>Description</p>
                <p>Actions</p>
            </div>
            <div class="service_table-items" v-for ="service in services" :key="service.id">
                <p>{{service.title}}</p>
                <button class="service_table-icon">
                    <i :class="service.icon"></i>
                </button>
                <p>{{service.description}}</p>
                <div>
                    <button class="btn-icon success">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn-icon danger">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
