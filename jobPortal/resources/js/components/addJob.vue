<template>
    <div id="addJob">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add job</div>

                    <div class="card-body">
                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right"></label>

                                <div class="col-md-6">
                                    <select id="company_id" v-model="job.company_id" type="text" class="form-control " name="company_id" value="" required autocomplete="company_id" autofocus>
                                        <option selected></option>
                                        <option v-for="company in companies" v-bind:value="company.id" v-if=" companies.length==1 ">
                                            {{ company.business_name }}
                                        </option>
                                    </select>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="job_title" type="text" v-model="job.job_title" class="form-control " name="job_title" value="" required autocomplete="job_title" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="job_description" v-model="job.job_description" type="text" class="form-control" name="job_description" required autocomplete="job_description" autofocus>

                                    </textarea>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Salary</label>

                                <div class="col-md-6">
                                    <input id="salary" v-model="job.salary" type="number" class="form-control " name="salary" value="" required autocomplete="salary" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">Location</label>

                                <div class="col-md-6">
                                    <input id="location" v-model="job.location" type="text" class="form-control " name="location" value="" required autocomplete="location">

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <select id="country" v-model="job.country" class="form-control " name="country"
                                            required autocomplete="country" autofocus>
                                        <option selected="selected"></option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Bhutan">Bhutan</option>

                                    </select>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" @click.prevent="addJob">
                                        Add Job
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        // name: "addJob"
        data(){
            return{
                companies:[],
                job:{
                    company_id:0,
                    job_title:null,
                    job_description:null,
                    salary:0,
                    location:null,
                    country:null

                }
            }
        },
        methods:{
            fetchCompany(){
                fetch('api/company')
                    .then(res => res.json())
                    .then(res => {
                        this.companies = res.data;
                        // console.log(res.data);
                    })
                    .catch(error => console.log(error) )
            },

            addJob(){
                fetch('api/job',{
                    method:'POST',
                    body:JSON.stringify(this.job),
                    headers:{
                        'content-type': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(res => {
                        this.$router.push('/jobs');
                    })
                    .catch(error => console.log(error) )
            }
        },
        created() {
            this.fetchCompany();
        }
    }

</script>

<style scoped>

</style>
