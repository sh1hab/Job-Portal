<template>
    <div id="job" class="row">

        <div class="float-left">
            <a class="btn" href="">Add a new job</a>
        </div>

        <table class="table table-hover" v-show="show_page=='tables'">
            <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>

            </thead>

            <tbody>
                <tr v-for="job in jobs" v-bind:key="job.id">

                    <td>{{ job.id }}</td>
                    <td>{{ job.company.business_name }}</td>
                    <td>{{ job.job_title }}</td>
                    <td>{{ job.job_description }}</td>
                    <td>{{ job.salary }}</td>
                    <td>
                        <input type="hidden" value="" name="job_id">
                        <input type="hidden" value="" name="company_id">
                        <button class="btn btn-success" value="" v-on:click="editJob(job.id)">edit</button>
                        <button class="btn btn-danger" value="" v-on:click="deleteJob(job.id)">Delete</button>
                    </td>

                </tr>
            </tbody>

        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item" v-bind:class="[ {disabled:!pagination.prev_page_url } ]">
                    <a class="page-link" href="#" @click="fetchJobs(pagination.prev_page_url)">Previous</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link text-dark" href="#">
                    Page {{ pagination.current_page }} of {{ pagination.last_page }}
                    </a>
                </li>
                <li class="page-item" v-bind:class="[ {disabled:!pagination.next_page_url } ]">
                    <a class="page-link" href="#" @click="fetchJobs(pagination.next_page_url)">Next</a>
                </li>
            </ul>
        </nav>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                job: {
                    id: '',
                    company: {
                        business_name: ''
                    }
                },
                jobs: [],
                job_id: '',
                pagination: {},
                show_page:'tables'

            }
        },
        created() {
            this.fetchJobs();
        },
        mounted() {
            // console.log('Component mounted.')
            // let promise=new Promise(function(resolve,reject){
            //
            // })
            //     .finally(()=>{}
            //     .then()
            // );
            //
            // promise.then(
            //     result=>alert(),
            //     error=>alert()
            // )
        },
        methods: {
            fetchJobs(page_url='api/jobs') {
                let vm=this;
                fetch(page_url)
                    .then(res => res.json())
                    // .catch((e)=>{
                    //     console.log(e);
                    // })
                    .then(res => {
                        this.jobs = res.data;
                        this.paginate(  res.meta, res.links);
                        console.log(res.data);
                    })
                    .catch(error => console.log(error) )
            },
            paginate(meta, links){
                let pagination={
                    current_page    :meta.current_page,
                    last_page       :meta.last_page,
                    next_page_url   :links.next,
                    prev_page_url   :links.prev
                }
                this.pagination=pagination;
            },
            editJob(id){
                fetch('api/job/'+id,{
                    method:'get'
                }).then( res => res.json() )
                    .then( data => {
                        alert('Job Deleted');
                        this.fetchJobs();
                    })
                    .catch( err => console.log(err) )
            },
            getAddpage(){

            },
            deleteJob(id){
                if( confirm('Are you sure') ){
                    fetch('api/job/'+id,{
                        method:'delete'
                    }).then( res => res.json() )
                        .then( data => {
                            console.log( data );
                            alert('Job Deleted');
                        })
                        .catch( err => console.log(err) )
                }else{

                }
            }
        }
    }
</script>
