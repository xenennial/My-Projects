/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Aplikasi_Kasir;

import com.mysql.cj.jdbc.result.ResultSetMetaData;
import java.sql.*;
import java.util.Vector;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableModel;

/**
 *
 * @author Alex
 */
public class TableMethods {

    public static DefaultTableModel buildTableModel(ResultSet rs) throws SQLException {
        ResultSetMetaData metaData = (ResultSetMetaData) rs.getMetaData();

        int columnCount = metaData.getColumnCount();

        Vector<String> columnNames = new Vector<>();
        for (int column = 1; column <= columnCount; column++) {
            columnNames.add(metaData.getColumnName(column));
        }

        Vector<Vector<Object>> data = new Vector<>();
        while (rs.next()) {
            Vector<Object> row = new Vector<>();
            for (int column = 1; column <= columnCount; column++) {
                row.add(rs.getObject(column));
            }
            data.add(row);
        }

        return new DefaultTableModel(data, columnNames);
    }

    public static DefaultTableModel getQueryModel(String queryString) {
        DefaultTableModel tableModel = new DefaultTableModel();

        try {
            Statement statement = DBConnector.conn.createStatement();
            ResultSet resultSet = statement.executeQuery(queryString);

            // Get ResultSet metadata (column names)
            ResultSetMetaData metaData = (ResultSetMetaData) resultSet.getMetaData();
            int columnCount = metaData.getColumnCount();

            // Add column names to the table model
            for (int column = 1; column <= columnCount; column++) {
                tableModel.addColumn(metaData.getColumnLabel(column));
            }

            // Add rows to the table model
            while (resultSet.next()) {
                Object[] rowData = new Object[columnCount];
                for (int column = 1; column <= columnCount; column++) {
                    rowData[column - 1] = resultSet.getObject(column);
                }
                tableModel.addRow(rowData);
            }

            resultSet.close();
            statement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }

        return tableModel;
    }

    public static void updateTableModel(JTable table, TableModel newModel) {
        table.setModel(newModel);
        table.getTableHeader().repaint();
        table.repaint();
    }

}
