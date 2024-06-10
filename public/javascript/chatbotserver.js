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

app.listen(3001, () => {
    console.log('Server is running on port 3001');
  });
