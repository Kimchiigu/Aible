const express = require("express");
const cors = require('cors');
const { AzureOpenAI } = require("openai");
const dotenv = require("dotenv");

dotenv.config();

const app = express();
const port = process.env.PORT || 3001;

const endpoint = process.env.AZURE_OPENAI_ENDPOINT || "https://aiblecvmaker.openai.azure.com/";
const apiKey = process.env.AZURE_OPENAI_API_KEY || "ba834e6a110d48309a37c4dc93d3b93d";
const apiVersion = "2024-05-01-preview";
const deployment = "aiblecvmaker";

app.use(express.json());
app.use(cors());

app.post("/generate-resume", async (req, res) => {
    const { content } = req.body;

    const client = new AzureOpenAI({ endpoint, apiKey, apiVersion, deployment });

    try {
        const result = await client.chat.completions.create({
            messages: content,
            model: "gpt-4",
        });

        const responseContent = result.choices[0].message.content;

        // Parse the response content into structured data
        const data = parseResumeData(responseContent);

        res.json(data);
    } catch (error) {
        console.error("Error generating resume:", error);
        res.status(500).json({ error: "Internal server error" });
    }
});

app.post("/chat-bot", async (req, res) => {
    const { content } = req.body;

    const client = new AzureOpenAI({ endpoint, apiKey, apiVersion, deployment });

    try {
        const result = await client.chat.completions.create({
            messages: content,
            model: "gpt-4",
        });

        const responseContent = result.choices[0].message.content;

        res.json(responseContent);
    } catch (error) {
        console.error("Error generating resume:", error);
        res.status(500).json({ error: "Internal server error" });
    }
});

app.post("/task-manager", async (req, res) => {
    const { content } = req.body;

    const client = new AzureOpenAI({ endpoint, apiKey, apiVersion, deployment });

    try {
        const result = await client.chat.completions.create({
            messages: content,
            model: "gpt-4",
        });

        const responseContent = result.choices[0].message.content;

        res.json(responseContent);
    } catch (error) {
        console.error("Error generating resume:", error);
        res.status(500).json({ error: "Internal server error" });
    }
});

function parseResumeData(content) {
    const lines = content.trim().split('\n');
    const data = {
        "Name": "",
        "Contact Information": "",
        "Professional Summary": "",
        "Work History": [],
        "Education": [],
        "Skills": [],
        "Error" : []
    };

    let currentSection = '';

    lines.forEach(line => {
        line = line.trim();
        if (line.startsWith('Name:')) {
            data["Name"] = line.replace('Name: ', '').trim();
        } else if (line.startsWith('Contact Information:')) {
            data["Contact Information"] = line.replace('Contact Information: ', '').trim();
        } else if (line.startsWith('Professional Summary:')) {
            data["Professional Summary"] = line.replace('Professional Summary: ', '').trim();
        } else if (line.startsWith('Work History:')) {
            currentSection = 'Work History';
        } else if (line.startsWith('Education:')) {
            currentSection = 'Education';
        }else if (line.startsWith('Skills:')) {
            currentSection = 'Skills';
            data["Skills"] = line.replace('Skills: ', '').trim().split(', ').map(skill => skill.trim());
        } else if (currentSection === 'Work History') {
            if (line.startsWith('- ')) {
                data["Work History"].push({});
            }
            const lastEntry = data["Work History"][data["Work History"].length - 1];
            if (line.includes('Job Title:')) {
                lastEntry["Job Title"] = line.replace('- Job Title: ', '').trim();
            } else if (line.includes('Company:')) {
                lastEntry["Company"] = line.replace('- Company: ', '').trim();
            } else if (line.includes('Location:')) {
                lastEntry["Location"] = line.replace('- Location: ', '').trim();
            } else if (line.includes('Year:')) {
                lastEntry["Year"] = line.replace('- Year: ', '').trim();
            } else if (line.includes('Duties:')) {
                lastEntry["Duties"] = line.replace('- Duties: ', '').trim();
            }
        } else if (currentSection === 'Education') {
            if (line.startsWith('- ')) {
                data["Education"].push({});
            }
            const lastEntry = data["Education"][data["Education"].length - 1];
            if (line.includes('University Name:')) {
                lastEntry["University Name"] = line.replace('- University Name: ', '').trim();
            } else if (line.includes('Year:')) {
                lastEntry["Year"] = line.replace('- Year: ', '').trim();
            }
        }else{
            console.log("ERRORRR")
            data["Error"].push(line);
        }
    });
    console.log(content);
    console.log(data);
    return data;
}


app.listen(3001, () => {
  console.log('Server is running on port 3001');
});
