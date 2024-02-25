<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <input
                        type="text"
                        v-model="search"
                        class="form-control"
                        placeholder="dd-mm-aaaa"
                    />
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div
                        v-if="search.length > 0"
                        class="col-md-3"
                        v-for="(item, index) in filteredDates"
                        :key="index"
                    >
                        <ul class="list-unstyled">
                            <li>{{ item.date }}</li>
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
            dates: [],
            search: "",
        };
    },
    computed: {
        filteredDates() {
            return this.dates.filter((date) =>
                date.date.toLowerCase().includes(this.search.toLowerCase())
            );
        },
    },
    mounted() {
        this.fetchDates();
    },
    methods: {
        fetchDates() {
            axios
                .get("/working-hours/search")
                .then((response) => {
                    this.dates = response.data;
                })
                .catch((error) => {
                    console.error("Erro ao procurar colaboradores:", error);
                });
        },
    },
};
</script>
