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

    // Calculate date range for proportional spacing
    const minDate = new Date(Math.min(...dates));
    const maxDate = new Date(Math.max(...dates));

    console.log("mindate " + minDate);
    console.log("maxdate " + maxDate);

    nodes.forEach(node => {
        const milestones = node.querySelectorAll('.milestone');

        const totalDays = (maxDate - minDate) / (1000 * 60 * 60 * 24);


        milestones.forEach((milestone, index) => {
            let prevMilestoneDate;
            if (index === 0) {
                prevMilestoneDate = minDate;
            }
            else{
                prevMilestoneDate = parseDate(milestones[index - 1].dataset.date);
            }
            const currentMilestoneDate = parseDate(milestone.dataset.date);

            const daysDifference = (currentMilestoneDate - prevMilestoneDate) / (1000 * 60 * 60 * 24);
            const gapPercentage = (daysDifference / totalDays) * 100;

            console.log("milestones length: " + milestones.length);
            console.log(prevMilestoneDate + " percentage is " + gapPercentage +"index"+index);
            milestone.style.marginLeft = `${gapPercentage}%`;


        });
    });
});


const parseDate = (dateTimeString) => {
    const datePart = dateTimeString.split(' ')[0];
    return new Date(datePart);
};
