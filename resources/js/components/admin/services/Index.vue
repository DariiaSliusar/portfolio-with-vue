<script setup>
import Base from "../../layouts/admin/Base.vue";
import {onMounted, ref} from "vue";

let services = ref([])

onMounted(async () => {
    getServices()
})

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
            <button class="open-modal">New Service</button>
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

        <!-------------- SERVICES MODAL --------------->
        <div class="modal ">
            <div class="modal-content">
                <h2>Create Service</h2>
                <span class="close-modal">×</span>
                <hr>
                <div>
                    <label>Service Name</label>
                    <input type="text" />

                    <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                                Awesome)</span></label>

                    <input type="text" />

                    <label>Description</label>
                    <textarea cols="10" rows="5"></textarea>
                </div>
                <hr>
                <div class="modal-footer">
                    <button class="close-modal">
                        Cancel
                    </button>
                    <button class="secondary close-modal">
                        <span><i class="fa fa-spinner fa-spin"></i></span>
                        Save
                    </button>
                </div>

            </div>
        </div>


    </section>
</template>
