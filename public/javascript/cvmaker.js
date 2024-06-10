document.getElementById('submit').addEventListener('click', function() {
    var storyText = document.getElementById('story').value;
    const content = [
      { role: "system", content: "Please make it into dictionary form, and always put all the error in the first place. Please put skill and contact information in comma seperated" },
      { role: "user", content: "Please provide the following information in a structured format: Name: [name of person]\n, Contact Information: [Email: ..., PhoneNumber: ...], Professional Summary: [Sumary of professional summary], Work History: [- Job Title: \n - Company: \n - Location: \n, - Year: \n, - Duties: \n], Education: [- University Name: \n, - Year: ], Skills: [list of skills], Error: [Error: Empty Name, Empty Contact Information, Empty Professional Summary, Empty Work History, Empty Education, Empty Skills]" },
      { role: "user", content: storyText},
      ]

    fetch("http://localhost:3001/generate-resume", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ content })
    })
    .then(response => response.json())
    .then(data => {
        // Populate Name and Contact Information
           document.getElementById('name-text').innerText = data.Name;
          document.getElementById('contact-text').innerText = data['Contact Information'];
          document.getElementById('summary-text').innerText = data['Professional Summary'];

          const workHistory = data['Work History'];
          let history = '';
          for (const job of workHistory) {
              for (const key in job) {
                  if (key === 'Job Title') {
                      history += `<h3>${job[key]}</h3>`;
                  } else {
                      history += `${key}: ${job[key]}<br>`;
                  }
              // history += '<br>';  // Add an extra newline for spacing between jobs
              }
          }
          document.getElementById('work-history-text').innerHTML = history;
          document.getElementById('skills-text').innerText = data.Skills.join(', ');

          const education = data.Education;
          let educationText = '';
          for (const edu of education) {
              for (const key in edu) {
                  if(key == 'University Name'){
                      educationText += `<h3>${edu[key]}</h3>`;
                  }else{
                      educationText += `${key}: ${edu[key]}<br>`;
                  }
              }
          }
          document.getElementById('education-text').innerHTML = educationText;

          const error = data['Error'];
          if(error.includes('N/A')){
              error = '';
          }
          document.getElementById('error-msg').innerText = error;
    })
    .catch(error => console.error("Error:", error));
  });
