import { Bar } from 'vue-chartjs'

export default {
    extends: Bar,
    mounted() {
        // Overwriting base render method with actual data.
        this.renderChart({
            labels: ['ICT', 'Finance', 'HR', 'PR', 'Admin', 'Sales', 'CRM'],
            datasets: [
                {
                    label: 'Business Units Vs Risks',
                    backgroundColor: '#f81779',
                    data: [90, 20, 12, 39, 15, 40, 39]
                }
            ]
        })
    }
}
