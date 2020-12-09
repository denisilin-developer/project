<template>
    <el-container>
        <el-main>
            <el-row :gutter="20" type="flex" justify="center">
                <el-col :span="5">
                    <el-form ref="form" :model="search" class="demo-form-inline">
                        <el-row :gutter="20">
                            <el-col :span="24">
                                <el-form-item label="Name">
                                    <el-input v-model="search.name" placeholder="Name"/>
                                </el-form-item>
                            </el-col>
                            <el-col :lg="12" :xs="24">
                                <el-form-item label="Bedrooms">
                                    <el-input min="0" type="number" v-model="search.bedrooms" placeholder="Bedrooms"/>
                                </el-form-item>
                            </el-col>
                            <el-col :lg="12" :xs="24">
                                <el-form-item label="Storeys">
                                    <el-input min="0" type="number" v-model="search.storeys" placeholder="Storeys"/>
                                </el-form-item>
                            </el-col>
                            <el-col :lg="12" :xs="24">
                                <el-form-item label="Garages">
                                    <el-input min="0" type="number" v-model="search.garages" placeholder="Garages"/>
                                </el-form-item>
                            </el-col>
                            <el-col :lg="12" :xs="24">
                                <el-form-item label="Garages">
                                    <el-input min="0" type="number" v-model="search.garages" placeholder="Garages"/>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-row :gutter="20">
                            <el-col :lg="12" :xs="24">
                                <el-form-item label="Price From">
                                    <el-input min="0" type="number" v-model="search.price_from"
                                              placeholder="Price From"/>
                                </el-form-item>
                            </el-col>
                            <el-col :lg="12" :xs="24">
                                <el-form-item label="Price To">
                                    <el-input min="0" type="number" v-model="search.price_to" placeholder="Price To"/>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-form-item>
                            <el-button :loading="isLoading" icon="el-icon-search" type="primary" @click="onSubmit">
                                Search
                            </el-button>
                        </el-form-item>
                    </el-form>
                </el-col>

                <el-col :span="14">
                    <el-table
                            empty-text="No results were found"
                            :data="items.data"
                            border
                            stripe>
                        <el-table-column
                                prop="name"
                                label="Name"/>
                        <el-table-column
                                prop="price"
                                label="Price"/>
                        <el-table-column
                                prop="bedrooms"
                                label="Bedrooms"/>
                        <el-table-column
                                prop="bathrooms"
                                label="Bathrooms"/>
                        <el-table-column
                                prop="storeys"
                                label="Storeys"/>
                        <el-table-column
                                prop="garages"
                                label="Garages"/>
                    </el-table>
                </el-col>
            </el-row>
        </el-main>
    </el-container>
</template>

<script>
	import {mapGetters} from 'vuex';

	export default {
		name: "App",


		computed: {
			...mapGetters(['items']),
		},

		async created() {
			await this.$store.dispatch('fetchItems');
		},

		methods: {
			resetForm(formName) {
				this.$refs[formName].resetFields();
			},

			async onSubmit() {
				this.isLoading = true;

				try {
					setTimeout(async () => {
						await this.$store.dispatch('fetchItems', this.search);

						this.isLoading = false;
					}, 1000);

				} catch (e) {
					this.isLoading = false;
				}
			}
		},

		data() {
			return {
				isLoading: false,
				search: {
					name: null,
					bedrooms: null,
					bathrooms: null,
					storeys: null,
					garages: null,
					price_from: null,
					price_to: null,
				},
			};
		},
	}
</script>

<style scoped>

</style>