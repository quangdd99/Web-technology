#include <iostream>
using namespace std;
int n,m;
bool visitted[21];
int x[21];
int C[21][21];
int c_min  = 1000000,f_max = 20000000, f;
void Try(int k){
    for(int v = 1;v<=n;v++){
        if (visitted[v] == false){
            x[k] = v;
            f+=C[x[k-1]][x[k]];
            visitted[v] = true;
            if (k == n){
                if (f+ C[x[n]][x[1]] < f_max) f_max = f+C[x[n]][x[1]];
            }
            else{
                int g = f+ (n-k+1)*c_min;
                if(g< f_max) Try(k+1);
            }

        }
        f -= C[x[k-1]][x[k]];
        visitted[v] = false;
    }

}
int main(){
    cin >> n>>m;
    for ( int i = 1; i <= n; i++ )
    {
        for ( int j = 1; j <= n; j++ )
        {
            if ( i == j ) C[i][j] = 0;
            else C[i][j] = c_min;
        }
    }
    for(int k =1;k<=m;k++){
        int i,j,c;
        cin >> i >> j >>c;
        C[i][j] = c;
        if(c_min> c) c_min = c;
    }
    int h = f_max;
    for(int i =1; i<=n;i++){
        for (int i = 1;i<=n;i++) visitted[i] = false;
        x[1] = i;
        f =0;
        visitted[x[1]] = true;
        Try(2);
        if(f_max< h) h = f_max;
        f_max = 20000000;}
    cout<< h;
}