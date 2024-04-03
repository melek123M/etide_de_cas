import Piece from "./components/Piece/Piece.vue";
import ShowPiece from "./components/Piece/Show.vue";
import EditPiece from "./components/Piece/Edit.vue";
import AddPiece from "./components/Piece/Create.vue";
import Salle from "./components/Salle/Salle.vue";
import ShowSalle from "./components/Salle/Show.vue";
import EditSalle from "./components/Salle/Edit.vue";
import AddSalle from "./components/Salle/Create.vue";
import Spectacle from "./components/Spectacle/Spectacle.vue";
import ShowSpectacle from "./components/Spectacle/Show.vue";
import EditSpectacle from "./components/Spectacle/Edit.vue";
import AddSpectacle from "./components/Spectacle/Create.vue";
export const routes = [
    {
        name: "pieces",
        path: "/pieces",
        component: Piece,
    },
    {
        name: "show-piece",
        path: "/show-piece/:id",
        component: ShowPiece,
    },
    {
        name: "edit-piece",
        path: "/edit-piece/:id",
        component: EditPiece,
    },
    {
        name: "add-piece",
        path: "/add-piece",
        component: AddPiece,
    },
    {
        name: "salles",
        path: "/salles",
        component: Salle,
    },
    {
        name: "show-salle",
        path: "/show-salle/:id",
        component: ShowSalle,
    },
    {
        name: "edit-salle",
        path: "/edit-salle/:id",
        component: EditSalle,
    },
    {
        name: "add-salle",
        path: "/add-salle",
        component: AddSalle,
    },
    {
        name: "spectacles",
        path: "/spectacles",
        component: Spectacle,
    },
    {
        name: "show-spectacle",
        path: "/show-spectacle/:id",
        component: ShowSpectacle,
    },
    {
        name: "edit-spectacle",
        path: "/edit-spectacle/:id",
        component: EditSpectacle,
    },
    {
        name: "add-spectacle",
        path: "/add-spectacle",
        component: AddSpectacle,
    },
];
