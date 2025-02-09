import { createContext, useContext, useState, useEffect} from 'react';;
// import axios from "axios";
import api from "../services/api";

// const BASE_URL = "/wp-json/kdev-Post-api/v1/"; // Reemplaza con tu URL real

// type Post
// {
//     id: number,
//     name: string,
//     symbol: string,
//     image: stirng | null
// }

const PostContext = createContext();

export const PostProvider = ({ children }) => {
  const [posts, setPosts] = useState([]);

  // Cargar datos desde la API al iniciar
  useEffect(() => {
    const fetchPosts = async () => {
      try {
        const { data } = await api.get("posts");
        setPosts(data);
      } catch (error) {
        console.error("Error al cargar intercambios:", error);
      }
    };
    fetchPosts();
  }, []);

  const getPost = (id) => {
    return posts.filter(post => post.id == id)[0]
  }

  
  // Agregar una nueva moneda a la colección
  const addPost = (newPost) => {
    setPosts(prevPosts => [...prevPosts, newPost]);
  };

  // Remover una moneda de la colección por ID
  const removePost = (id) => {
    setPosts(prevPosts => prevPosts.filter(post => post.id != id));
  };
  

  const updatePost = (id, newValue) => {
    setPosts(prevPosts =>
      prevPosts.map(post =>
        post.id == id ? newValue : post 
      )
    );
  };

  return (
    <PostContext.Provider value={{ posts, getPost, addPost, removePost, updatePost }}>
      {children}
    </PostContext.Provider>
  );
};

export const usePost = () => {
  const context = useContext(PostContext);
  if (!context) {
    throw new Error("usePost debe usarse dentro de PostProvider");
  }
  return context;
};
