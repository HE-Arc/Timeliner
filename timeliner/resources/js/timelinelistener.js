document.addEventListener('DOMContentLoaded', () => {
    const nodes = document.querySelectorAll('.node');
    const dates = [];

    if (nodes.length === 0) {
        console.warn("No nodes found.");
        return;
    }

    // Gather all milestone dates for range calculation
    nodes.forEach(node => {
        const milestones = node.querySelectorAll('.milestone');
        milestones.forEach(milestone => {
            const date = milestone.dataset.date;
            if (date) dates.push(parseDate(date));
        });
    });

    if (dates.length === 0) {
        console.warn("No milestone dates found.");
        return;
    }

    let timelineWidth = 100;
    updateTimelineWidth(timelineWidth); //

    const timelineSlider = document.getElementById('timelineSlider');

    // listener for the change of the slider, to readjust timeline output
    timelineSlider.addEventListener('input', (event) => {
        timelineWidth = event.target.value;
        timelineWidthValue.textContent = timelineWidth;
        updateTimelineWidth(timelineWidth);
    });

    // readjust output of the timeline
    function updateTimelineWidth(newWidth) {

        // Calculate date range for proportional spacing
        const minDate = new Date(Math.min(...dates));
        const maxDate = new Date(Math.max(...dates));

        nodes.forEach(node => {
            const milestones = node.querySelectorAll('.milestone');

            const totalDays = (maxDate - minDate) / (1000 * 60 * 60 * 24);

            const totalTimelineWidth = newWidth;
            const scalingFactor = totalTimelineWidth / totalDays;

            let offset;
            let cumulativePosition = 32;

            milestones.forEach((milestone, index) => {
                let prevMilestoneDate;
                offset = milestone.offsetWidth / 2;
                if (index === 0) {
                    prevMilestoneDate = minDate;
                } else {
                    prevMilestoneDate = parseDate(milestones[index - 1].dataset.date);
                }

                const currentMilestoneDate = parseDate(milestone.dataset.date);
                const daysDifference = (currentMilestoneDate - prevMilestoneDate) / (1000 * 60 * 60 * 24);

                // Calculate the value as pixels defined by scaling factor set by user
                const gapInPixels = daysDifference * scalingFactor;

                cumulativePosition += gapInPixels*totalTimelineWidth;

                // Position this milestone based on cumulative gap and center it.
                milestone.style.position = "absolute";
                milestone.style.left = `${cumulativePosition - offset}px`;
            });

            // adjust node and milestone containers width (needed since the milestones are placed via absolute position)
            node.style.width = `${cumulativePosition + (milestones.length+1)*offset}px`;
            const milestonesContainer = document.querySelector('.milestones-container');
            milestonesContainer.style.width = `${cumulativePosition}px`;
        });
}
});


const parseDate = (dateTimeString) => {
    const datePart = dateTimeString.split(' ')[0];
    return new Date(datePart);
};
