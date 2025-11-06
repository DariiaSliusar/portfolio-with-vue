<script setup>
    import Base from "../../layouts/admin/Base.vue";
    import Nav from "../../layouts/admin/Nav.vue";
    import {onMounted, reactive, ref} from "vue";

    const form = reactive({
        name: '',
        email: '',
        phone: '',
        address: '',
        description: '',
        summary: '',
        tagline: '',
        home_image: '',
        banner_image: '',
        cv: '',
        home_image_file: null,
        banner_image_file: null,
        cv_file: null
    })

    onMounted(async() => {
        getAbout()
    })

    const getAbout = async () => {
        await axios.get("/api/abouts/")
            .then(({data}) => {
                console.log(data)
                form.name = data.about.name
                form.email = data.about.email
                form.phone = data.about.phone
                form.address = data.about.address
                form.description = data.about.description
                form.summary = data.about.summary
                form.tagline = data.about.tagline
                form.home_image = data.about.home_image
                form.banner_image = data.about.banner_image
                form.cv = data.about.cv
                form.home_image_file = null
                form.banner_image_file = null
                form.cv_file = null
        })
    }

    let errors = ref([]);

    const getHomeImage = () => {
        if (form.home_image_file) {
            return URL.createObjectURL(form.home_image_file);
        } else if (form.home_image) {
            return "/uploads/" + form.home_image;
        } else {
            return "/template/assets/img/avatar.jpg";
        }
    }

    const getBannerImage = () => {
        if (form.banner_image_file) {
            return URL.createObjectURL(form.banner_image_file);
        } else if (form.banner_image) {
            return "/uploads/" + form.banner_image;
        } else {
            return "/template/assets/img/avatar.jpg";
        }
    }

    const handleHomeImageChange = (e) => {
        form.home_image_file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = () => {
            let output = document.getElementById("home_img");
            output.src = reader.result;
        }
        reader.readAsDataURL(form.home_image_file);
    }

    const handleBannerImageChange = (e) => {
        form.banner_image_file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = () => {
            let output = document.getElementById("banner-img");
            output.src = reader.result;
        }
        reader.readAsDataURL(form.banner_image_file);
    }

    const handlePdfChange = (e) => {
        form.cv_file = e.target.files[0];
    }

    const handleSave = async () => {
        let formData = new FormData();
        formData.append('name', form.name);
        formData.append('email', form.email);
        formData.append('phone', form.phone);
        formData.append('address', form.address);
        formData.append('description', form.description);
        formData.append('summary', form.summary);
        formData.append('tagline', form.tagline);

        if (form.home_image_file) {
            formData.append('home_image', form.home_image_file);
        }
        if (form.banner_image_file) {
            formData.append('banner_image', form.banner_image_file);
        }
        if (form.cv_file) {
            formData.append('cv', form.cv_file);
        }

        await axios.post("/api/abouts/", formData)
            .then(({data}) => {
                toast.fire({
                    icon: 'success',
                    title: 'About Me updated successfully'
                })
                getAbout();
            })
            .catch((error) => {
                if(error.response.status === 422){
                    errors.value = error.response.data.errors;
                }
            });
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
                        <h1>About Me</h1>
                        <button class="secondary" @click="handleSave">
                            Update Changes
                        </button>
                    </div>
                    <div class="card-wrapper">
                        <div class="wrapper_left">
                            <div class="card">
                                <label>Full Name</label>
                                <span style="color:red" v-if="errors.name">{{ errors.name }}</span>
                                <input type="text" v-model="form.name" />

                                <label>Email</label>
                                <span style="color:red" v-if="errors.email">{{ errors.email }}</span>
                                <input type="email" v-model="form.email" />

                                <label>Phone</label>
                                <input type="text" v-model="form.phone" />

                                <label>Address</label>
                                <input type="text" v-model="form.address" />

                                <label>Description</label>
                                <textarea type="text" cols="10" rows="3" v-model="form.description"></textarea>

                                <label>Summary</label>
                                <textarea type="text" cols="10" rows="2" v-model="form.summary"></textarea>

                            </div>
                            <div class="card">
                                <label>Tagline</label>
                                <input type="text" v-model="form.tagline" />
                            </div>

                        </div>
                        <div class="wrapper_right">
                            <div class="card">
                                <label>Home Image</label>
                                <img :src="getHomeImage()" class="avatar_img" id="home_img">
                                <input type="file" @change="handleHomeImageChange" />
                            </div>
                            <div class="card">
                                <label>About Image</label>
                                <img :src="getBannerImage()" class="avatar_img" id="banner-img">
                                <input type="file" @change="handleBannerImageChange" />
                            </div>
                            <div class="card">
                                <p>CV</p>
                                <input accept="pdf/*" type="file" @change="handlePdfChange" />
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section>
        </section>
    </section>
</template>
