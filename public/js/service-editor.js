// Fichier : public/js/service-editor.js

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('editor_holder');

    // Si l'éditeur n'est pas sur cette page, on ne fait rien.
    if (!container) {
        return;
    }

    // On récupère l'ID du service depuis l'attribut "data" de notre div
    const serviceId = container.dataset.serviceId;
    if (!serviceId) {
        container.innerHTML = "<p class='text-red-500'>Erreur: ID du service non trouvé.</p>";
        return;
    }

    // On construit l'URL pour récupérer les données du contenu de la page
    const dataUrl = `/admin/services/${serviceId}/content`;

    // C'est la "recette" de notre formulaire visuel
    const schema = {
        type: "object",
        title: "Éditeur de Page",
        properties: {
            description: {
                type: "array",
                title: "Blocs de Contenu Principal",
                items: {
                    type: "object",
                    title: "Bloc",
                    properties: {
                        type: { type: "string", title: "Type de bloc", enum: ["paragraph", "heading", "list"] },
                        content: { type: "string", title: "Contenu (pour Paragraphe ou Titre)" },
                        items: {
                            type: "array",
                            title: "Éléments de liste (si type='list')",
                            items: {
                                type: "object",
                                title: "Élément",
                                properties: {
                                    title: { type: "string" },
                                    description: { type: "string" }
                                }
                            }
                        }
                    }
                }
            },
            key_benefits: {
                type: "array",
                title: "Points Clés (dans la barre latérale)",
                items: { type: "string", title: "Point Clé" }
            },
            portfolio_examples: {
                type: "array",
                title: "Exemples de Réalisations (en bas de page)",
                items: {
                    type: "object",
                    title: "Exemple",
                    properties: {
                        title: { type: "string" },
                        image: { type: "string", description: "ex: images/portfolio/mon-image.jpg" },
                        description: { type: "string" }
                    }
                }
            }
        }
    };

    // On affiche un message de chargement
    container.innerHTML = "<p>Chargement de l'éditeur...</p>";

    // On va chercher les données sur le serveur...
    fetch(dataUrl)
        .then(response => response.json())
        .then(startValues => {
            // ... et une fois reçues, on initialise l'éditeur.
            const editor = new JSONEditor(container, {
                schema: schema,
                startval: startValues,
                theme: 'tailwind',
                iconlib: 'fontawesome5'
            });

            // On lie l'éditeur au formulaire pour la sauvegarde
            const serviceForm = document.getElementById('service-form');
            const pageContentTextarea = document.getElementById('page_content_textarea');

            serviceForm.addEventListener('submit', function() {
                pageContentTextarea.value = JSON.stringify(editor.getValue());
            });
        })
        .catch(error => {
            container.innerHTML = "<p class='text-red-500'>Erreur: Impossible de charger les données pour l'éditeur.</p>";
            console.error('Erreur lors de la récupération du contenu du service:', error);
        });
});
