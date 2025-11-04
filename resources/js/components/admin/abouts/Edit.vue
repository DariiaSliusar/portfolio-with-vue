<script setup>
    import Base from "../../layouts/admin/Base.vue";
    import Nav from "../../layouts/admin/Nav.vue";
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
                        <button class="secondary">
                            Update Changes
                        </button>
                    </div>
                    <div class="card-wrapper">
                        <div class="wrapper_left">
                            <div class="card">
                                <label>Full Name</label>
                                <input type="text" />

                                <label>Email</label>
                                <input type="email" />

                                <label>Phone</label>
                                <input type="text" />

                                <label>Address</label>
                                <input type="text" />

                                <label>Description</label>
                                <textarea type="text" cols="10" rows="3"></textarea>

                                <label>Summary</label>
                                <textarea type="text" cols="10" rows="2"></textarea>

                            </div>
                            <div class="card">
                                <label>Tagline</label>
                                <input type="text" />
                            </div>

                        </div>
                        <div class="wrapper_right">
                            <div class="card">
                                <label>Home Image</label>
                                <img src="/public/template/assets/img/avatar.jpg" class="avatar_img">
                                <input type="file" >
                            </div>
                            <div class="card">
                                <label>About Image</label>
                                <img src="/public/template/assets/img/avatar.jpg" class="avatar_img"
                                id="bannerImage-preview">
                                <input type="file" >
                            </div>
                            <div class="card">
                                <p>CV</p>
                                <input accept="pdf/*" type="file">
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
