document.addEventListener('DOMContentLoaded', function() {
    const nodes = document.querySelectorAll('.constellation-node');
    const bridges = document.querySelectorAll('.quantum-bridge');

    nodes.forEach(node => {
        node.addEventListener('click', function() {
            const group = this.closest('.constellation-group');
            const pattern = group.dataset.name;
            window.location.href = Routing.generate('constellation_reveal', { pattern: pattern });
        });

        node.addEventListener('mouseenter', function() {
            const group = this.closest('.constellation-group');
            activateQuantumBridges(group.dataset.name);
            createEnergyPulse(this);
        });

        node.addEventListener('mouseleave', function() {
            bridges.forEach(bridge => bridge.classList.remove('active'));
            document.querySelectorAll('.energy-pulse').forEach(pulse => pulse.remove());
        });
    });

    function activateQuantumBridges(nodeName) {
        bridges.forEach(bridge => {
            if (bridge.dataset.source === nodeName || bridge.dataset.target === nodeName) {
                bridge.classList.add('active');
            }
        });
    }

    function createEnergyPulse(node) {
        const pulse = document.createElementNS("http://www.w3.org/2000/svg", "circle");
        pulse.setAttribute("class", "energy-pulse");
        pulse.setAttribute("cx", node.getAttribute("cx"));
        pulse.setAttribute("cy", node.getAttribute("cy"));
        pulse.setAttribute("r", "5");
        node.parentNode.appendChild(pulse);
    }

    // Quantum frequency visualization
    function visualizeFrequencies() {
        nodes.forEach(node => {
            const power = node.dataset.power;
            const frequency = parseFloat(node.closest('.constellation-group')
                                          .querySelector('.node-label')
                                          .textContent.match(/\d+\.\d+/)[0]);
            
            const radius = 10 + (power / 10);
            const indicator = document.createElementNS("http://www.w3.org/2000/svg", "circle");
            indicator.setAttribute("class", "frequency-indicator");
            indicator.setAttribute("cx", node.getAttribute("cx"));
            indicator.setAttribute("cy", node.getAttribute("cy"));
            indicator.setAttribute("r", radius);
            
            node.parentNode.insertBefore(indicator, node);
        });
    }

    visualizeFrequencies();
});