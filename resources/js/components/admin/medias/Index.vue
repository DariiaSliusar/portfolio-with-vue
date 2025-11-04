<script setup>
import Base from "../../layouts/admin/Base.vue";
import Nav from "../../layouts/admin/Nav.vue";
import {onMounted, ref} from "vue";

let medias = ref([]);

onMounted(async () => {
    await getMedias();
})

const getMedias = async () => {
    await axios.get("/api/medias")
        .then(({data}) => {
            // console.log(data)
            medias.value = data.medias
        })
}
</script>

<template>
    <Base/>
    <section class="setting" id="setting">
        <div class="setting-wrapper">
            <div class="setting_nav">
                <div class="setting-titlebar">
                    <img src="/public/template/assets/img/avatar.jpg" alt="" class="setting-avatar">
                    <p>Natalia Brakux</p>
                </div>
                <Nav/>
            </div>
            <div class="setting_content">
                <section class="about" id="about">
                    <div class="titlebar">
                        <h1>Medias</h1>
                    </div>
                    <div class="card-wrappere">
                        <div class="card">
                            <h2>Social media</h2>
                            <div class="social_table-heading">
                                <p>Link</p>
                                <p>Icon</p>
                                <p></p>
                            </div>
                            <!-- item 1 -->
                            <div class="social_table-items" v-for="media in medias" :key="media.id">
                                <p>{{ media.link }}</p>
                                <button class="service_table-icon">
                                    <i :class="media.icon"></i>
                                </button>
                                <button>
                                    delete
                                </button>
                            </div>

                            <br>

                            <div class="social_table-heading">
                                <p>Link</p>
                                <span style="color:#006fbb;">(Find your icon class: Font Awesome)</span>
                                <p></p>
                            </div>
                            <p></p>
                            <div class="social_table-items">

                                <input type="text" />

                                <input type="text" />
                                <button>
                                    Add Media
                                </button>
                            </div>

                        </div>
                    </div>


                </section>
            </div>
        </div>
    </section>
</template>
