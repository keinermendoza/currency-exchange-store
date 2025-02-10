import { useEffect, useState } from "react";
import { useParams,  useNavigate } from "react-router";
import { usePost } from "../../contexts/PostContext";
import { fetchPostForm } from "../../services/fetchPost";
import {ModalDelete} from "../../components/ModalDelete";
import { fetchPost } from "../../services/fetchPost";
import { ComeBackLink } from "../../components/ComeBackLink";
import {displayResponseMessages} from "../../lib/utils";
import {PostForm} from "../../myComponents/PostForm";

export  function PostDetail() {
  let { id } = useParams();
  const endpoint = "posts/" + id;
  const navigate = useNavigate();
  const {getPost, removePost, updatePost} = usePost();
  const post = getPost(id)
  const [initialData, setInitialData] = useState();
  
  const onSubmit = async (data, setError) => {
    console.log(data)

    const newData = {...data, "_method":"PUT"}
    const formData = new FormData();
    Object.entries(newData).forEach(
      ([key, value]) => {
        if (value !== null && value !== undefined && value !== "") {
          formData.append(key, value)
        }
      }
    );
    const response = await fetchPostForm(endpoint, formData);

    displayResponseMessages(response, data, setError);

    if (!response.errors) {
      navigate("../");
      updatePost(id, response.data)
    }

  }

  const deletePost = async () => {
      const response = await fetchPost(endpoint, null, "DELETE");
      displayResponseMessages(response, {}, setError);
      
      if (!response.errors) {
        removePost(id);
        navigate("../");
      }
    }

  // update fields when data is loaded  
useEffect(() => {
  if (post) {
    setInitialData({
      title: post.title || "",
      excerpt: post.excerpt == "null" ? "" : post.excerpt,
      body: post.body == "null" ? "" : post.body,
      show_in_home:  post.show_in_home.toString()
    })
}}, [post]);

// const showInHome = watch("show_in_home");
  return (
    <section>
      <ComeBackLink />

       <h1 className="text-3xl font-medium">Editando Publicación: <b>{post?.title}</b></h1>

      <PostForm
        initialData={initialData}
        onSubmit={onSubmit}
        initialImage={post?.image}
        buttonText="Guardar Cambios"
      />

       <div className="mt-12 w-full max-w-4xl flex flex-col sm:flex-row gap-4 justify-between items-center">
         <div className="w-full max-w-lg">
           <p className="text-lg mb-2">Eliminar Publicación</p>
           <p>Esta acción no puede ser revertida</p>
         </div>

         <ModalDelete 
         deleteButtonText="Eliminar Publicación"
         deleteCallback={deletePost}>
           <h3 className="mb-2 text-lg text-gray-500 dark:text-gray-400">Estás seguro de que quieres eliminar esta Publicación?</h3>
         </ModalDelete>
       </div>

    </section>
  )
}


