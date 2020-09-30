let chart_config = (dataResource) => ({
    chart: {
        container: "#genealogy-diagram",

        animateOnInit: true,

        node: {
            collapsable: true,
            HTMLclass: 'tree-node'
        },
        animation: {
            nodeAnimation: "easeOutBounce",
            nodeSpeed: 700,
            connectorsAnimation: "bounce",
            connectorsSpeed: 700
        }
    },
    nodeStructure: dataResource
});
