import { useNavigate } from "react-router";
import { usePost } from "../../contexts/PostContext";
import { fetchPostForm } from "../../services/fetchPost";
import { ComeBackLink } from "../../components/ComeBackLink";
import {displayResponseMessages} from "../../lib/utils";
import { PostForm } from "../../myComponents/PostForm";

export function PostCreate() {
  const endpoint = "posts";
  const navigate = useNavigate();
  const {addPost} = usePost()
  
  const onSubmit = async (data, setError) => {
    const formData = new FormData();
    Object.entries(data).forEach(([key, value]) => {
      if (value !== null && value !== undefined && value !== "") {
        formData.append(key, value);
      }
    });

    const response = await fetchPostForm(endpoint, formData);
    displayResponseMessages(response, data, setError)

    if (!response.errors) {
      addPost(response.data)
      navigate("../");
    }
  }

  return (
    <section>
      <ComeBackLink />

      <h1 className="mb-10 text-3xl font-medium">Registrar Publicación</h1>
      <PostForm 
        initialData={{
          show_in_home:"0"
        }}
        onSubmit={onSubmit}
        initialImage={null}
        buttonText="Crear Publicación"
      />
    </section>
  )
}
