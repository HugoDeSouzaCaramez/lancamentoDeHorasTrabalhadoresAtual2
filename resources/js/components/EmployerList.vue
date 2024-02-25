<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <input
                        type="text"
                        v-model="search"
                        class="form-control"
                        placeholder="Buscar colaborador"
                    />
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Loop para renderizar os <li> -->
                    <div
                        v-if="search.length > 0"
                        class="col-md-3"
                        v-for="(item, index) in filteredEmployers"
                        :key="index"
                    >
                        <ul class="list-unstyled">
                            <li>{{ item.name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            employers: [],
            search: "",
        };
    },
    computed: {
        filteredEmployers() {
            return this.employers.filter((employer) =>
                employer.name.toLowerCase().includes(this.search.toLowerCase())
            );
        },
    },
    mounted() {
        this.fetchEmployers();
    },
    methods: {
        fetchEmployers() {
            axios
                .get("/search-employers")
                .then((response) => {
                    this.employers = response.data;
                })
                .catch((error) => {
                    console.error("Erro ao procurar colaboradores:", error);
                });
        },
    },
};
</script>
