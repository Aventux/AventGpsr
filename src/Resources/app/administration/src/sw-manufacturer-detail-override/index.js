import template from './sw-manufacturer-detail.html.twig';

const { Criteria } = Shopware.Data;

Shopware.Component.override('sw-manufacturer-detail', {
    template,
    data() {
        return {
            manufacturerGpsr: null
        }
    },
    methods: {
        async loadEntityData() {
            await this.$super('loadEntityData');

            if(this.manufacturer) {
                this.isLoading = true;

                let criteria = new Criteria();
                criteria.addFilter(
                    Criteria.equals('productManufacturerId', this.manufacturer.id)
                );

                this.manufacturerGpsrRepository.search(criteria, Shopware.Context.api)
                    .then(result => {
                        if (!result.first()) {
                            let productManufacturerGpsrEntity = this.manufacturerGpsrRepository.create(Shopware.Context.api);
                            productManufacturerGpsrEntity.productManufacturerId = this.manufacturer.id;

                            productManufacturerGpsrEntity = this.manufacturerGpsrRepository.save(productManufacturerGpsrEntity, Shopware.Context.api);

                            this.manufacturer.extensions.productManufacturerGpsr = productManufacturerGpsrEntity;
                        } else {
                            this.manufacturer.extensions.productManufacturerGpsr = result.first();
                        }
                    });

                this.isLoading = false;
            }
        }
    },
    computed: {
        manufacturerGpsrRepository() {
            return this.repositoryFactory.create('product_manufacturer_gpsr');
        },
    }

});