#ifndef MAINWINDOW_H
#define MAINWINDOW_H
#include "facture.h"
#include"transfert.h"
#include <QMainWindow>

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = nullptr);
    ~MainWindow();

private slots:
    void on_pb_ajouter_clicked();

    void on_pb_supprimer_clicked();

    void on_modifier_clicked();



    void on_pushButton_clicked();

    void on_pushButton_tri_clicked();

    void on_pushButton_ajouter2_clicked();

    void on_pushButton_3_clicked();

    void on_pushButton_4_clicked();

    void on_supprimer_transfert_clicked();

    void on_pushButton_6_clicked();

private:
    Ui::MainWindow *ui;
    Facture tmpfacture;
    Transfert tmptransfert;
};

#endif // MAINWINDOW_H
