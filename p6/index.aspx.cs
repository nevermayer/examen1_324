using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;

namespace WebApplication1
{
    public partial class index : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string connectionString = "Server=localhost;Database=midb_ramos;Uid=root;Pwd=;";
            MySqlConnection connection = new MySqlConnection(connectionString);

            try
            {
                connection.Open();
                Console.WriteLine("Conexión exitosa a MySQL.");

                string consultaSQL = "select * from personas where id_persona in (select id_persona from estudiante)";
                MySqlCommand cmd = new MySqlCommand(consultaSQL, connection);

                using (MySqlDataReader reader = cmd.ExecuteReader())
                {
                    HtmlTable miTabla = (HtmlTable)FindControl("miTabla");
                    int count = 0;
                    while (reader.Read())
                    {
                        count++;
                        string id = reader["id_persona"].ToString();
                        string nombres = reader["nombres"].ToString();
                        string materno = reader["materno"].ToString();
                        string paterno = reader["paterno"].ToString();
                        string fecha = reader["fec_nac"].ToString();
                        string sexo = reader["sexo"].ToString();

                        // Crear una nueva fila en la tabla y agregar celdas
                        HtmlTableRow fila = new HtmlTableRow();
                        HtmlTableCell celdaNumero = new HtmlTableCell();
                        HtmlTableCell celdaid = new HtmlTableCell();
                        HtmlTableCell celdaPaterno = new HtmlTableCell();
                        HtmlTableCell celdaFecha = new HtmlTableCell();
                        HtmlTableCell celdaSexo = new HtmlTableCell();
                        HtmlTableCell celdaEditar = new HtmlTableCell();
                        HtmlTableCell celdaBorrar = new HtmlTableCell();
                        celdaNumero.InnerText = count+"";
                        celdaid.InnerText = id;
                        celdaPaterno.InnerText = nombres+" "+paterno+" "+materno;
                        celdaFecha.InnerText = fecha;
                        celdaSexo.InnerText = sexo;
                        var enlaceEditar = new HtmlAnchor
                        {
                            InnerText = "Editar"
                        };
                        var enlaceBorrar = new HtmlAnchor
                        {
                            HRef = "eliminar.aspx?id="+ id,
                            InnerText = "Eliminar"
                        };
                        enlaceEditar.Attributes.Add("class", "btn btn-warning text-white");
                        enlaceEditar.Attributes.Add("onclick", "llenar_datos(`"+id+"`, `"+ nombres + "`, `"+ paterno + "`, `"+ materno + "`, `"+ fecha + "`, `"+ sexo + "`)");
                        enlaceBorrar.Attributes.Add("class", "btn btn-danger");
                        celdaEditar.Controls.Add(enlaceEditar);
                        celdaBorrar.Controls.Add(enlaceBorrar);

                        fila.Cells.Add(celdaNumero);
                        fila.Cells.Add(celdaid);
                        fila.Cells.Add(celdaPaterno);
                        fila.Cells.Add(celdaFecha);
                        fila.Cells.Add(celdaSexo);
                        fila.Cells.Add(celdaEditar);
                        fila.Cells.Add(celdaBorrar);

                        // Agregar la fila a la tabla
                        miTabla.Rows.Add(fila);
                    }
                    
                }

                connection.Close();
            }
            catch (MySqlException ex)
            {
                Response.Write("Error al conectar a MySQL: " + ex.Message);
            }

        }
    }
}