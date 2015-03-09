/* xor of each elements in the array leaves you with 
    element which is not repeated */
    
public class Solution {
    public int singleNumber(int[] A) {
        if(A==null || A.length==0){
            return -1;
        }
        int num=0;
    for(int i=0;i< A.length;i++){
        num= num^A[i];
        }
        return num;
    }
}